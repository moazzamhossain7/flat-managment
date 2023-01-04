<?php

namespace App\Http\Controllers\SslCommerz;

use App\Models\TenantPayment;
use App\Models\LotTenant;
use App\Models\Lot;
use App\Models\Order;
use App\Models\SslIpnLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Repositories\PaySslCommerzRepository;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller
{
    protected $sslcommerz;

    public function __construct(PaySslCommerzRepository $sslcommerz)
    {
        $this->sslcommerz = $sslcommerz;
    }

    /**
     * Redirect to login page.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return redirect()->route('login');
    }

    /**
     * Here you have to receive all the order data to initate the payment.
     * Lets your oder trnsaction informations are saving in a table called "orders"
     * In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be     * paid and "currency" is for storing Site Currency which will be checked with paid currency.
     *
     * @param  Request $request
     * @return mixed
     */
    public function payViaAjax(Request $request)
    {
        $lot = Lot::find($request->flat);
        $user = auth()->user();

        if (!$lot) {
            return response()->json(['message' => 'Invalid data!'], 400);
        }

        $this->sslcommerz->pay([
            'total_amount' => floor($lot->price), // You cant not pay less than 10
            'lot_id' => $lot->id, // You cant not pay less than 10
            'user_id' => $user->id,
            'name' => $user->first_name . " " . $user->last_name,
            'phone' => $user->phone,
            'is_web' => true,
        ]);
    }

    /**
     * Transaction success.
     */
    public function success(Request $request)
    {
        try {
            $amount = $request->input('amount');
            $tran_id = $request->input('tran_id');
            $currency = $request->input('currency');

            $sslc = new SslCommerzNotification();

            //Check order status in order tabel against the transaction id or order id.
            $order = Order::findOrderByTranId($tran_id);
            $orderId = $order->id;
            $isWeb = $order->is_backend_payment;

            if ($order->status == 'Pending') {
                $validation = $sslc->orderValidate($tran_id, $amount, $currency, $request->all());

                if ($validation == true) {
                    /*
                    That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successfull transaction to customer
                    */
                    Order::updateOrderStatus($tran_id, 'Processing');
                    LotTenant::create([
                        'lot_id' => $order->lot_id,
                        'tenant_id' => $order->user_id,
                        'start_date' => date('Y-m-d'),
                        'agreed_rent' => $order->amount,
                    ]);

                    TenantPayment::create([
                        'lot_id' => $order->lot_id,
                        'tenant_id' => $order->user_id,
                        'payment_date' => date('Y-m-d'),
                        'rent_month' => date('F'),
                        'trans_id' => $order->transaction_id,
                        'amount' => $order->amount,
                        'payment_method' => 'online',
                    ]);
                    Lot::where('id', $order->lot_id)->update(['status' => 'rented']);

                    return $this->redirectTo("success?invoice={$orderId}", $isWeb);

                    // if ($order->pay_for == 'match-booking') {
                    //     MatchBooking::storeBooking($order);
                    // } elseif ($order->pay_for == 'buy-products') {
                    //     $invoice = ProductInvoice::makeOrderInvoice($order);
                    //     $orderId = optional($invoice)->id;
                    // }

                    // return $this->redirectTo(in_array($order->pay_for, ['match-booking', 'buy-products']) ? ('success?invoice=' . $orderId . '&type=' . $order->pay_for) : 'success', $isWeb);
                } else {
                    /*
                    That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    Order::updateOrderStatus($tran_id, 'Failed');

                    return $this->redirectTo('failed', $isWeb); //validation Fail
                }
            } elseif ($order->status == 'Processing' || $order->status == 'Complete') {
                /*
                That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
                 */

                return $this->redirectTo("success?invoice={$orderId}", $isWeb);

                // if ($order->pay_for == 'match-booking') {
                //     MatchBooking::storeBooking($order);
                // } elseif ($order->pay_for == 'buy-products') {
                //     $invoice = ProductInvoice::makeOrderInvoice($order);
                //     $orderId = optional($invoice)->id;
                // }

                // return $this->redirectTo(in_array($order->pay_for, ['match-booking', 'buy-products']) ? ('success?invoice=' . $orderId . '&type=' . $order->pay_for) : 'success', $isWeb);
            } else {
                return $this->redirectTo('failed', $isWeb); //Invalid Transaction
            }
        } catch (\Exception $e) {
            return $this->redirectTo('failed', false); //No Order Found
        }
    }

    /**
     * When transaction is failed.
     *
     * @param  Request $request
     * @return mixed
     */
    public function fail(Request $request)
    {
        try {
            $tran_id = $request->input('tran_id');

            $order_details = Order::findOrderByTranId($tran_id);
            $isWeb = $order_details->is_backend_payment;

            if ($order_details->status == 'Pending') {
                Order::updateOrderStatus($tran_id, 'Failed');

                return $this->redirectTo('failed', $isWeb); // Transaction is Falied
            } elseif ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
                return $this->redirectTo('success', $isWeb);
            } else {
                return $this->redirectTo('failed', $isWeb); //Invalid Transaction
            }
        } catch (\Exception $e) {
            return $this->redirectTo('failed', false); //No Order Found
        }
    }

    /**
     * When transaction is cancel.
     *
     * @param  Request $request
     * @return mixed
     */
    public function cancel(Request $request)
    {
        try {
            $tran_id = $request->input('tran_id');

            $order_details = Order::findOrderByTranId($tran_id);

            if ($order_details->status == 'Pending') {
                Order::updateOrderStatus($tran_id, 'Canceled');

                return $this->redirectTo('cancel'); //Cancel Transaction
            } elseif ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
                return $this->redirectTo('success'); // Transaction is already Successful
            } else {
                return $this->redirectTo('failed'); //Invalid Transaction
            }
        } catch (\Exception $e) {
            return $this->redirectTo('failed', false); //No Order Found
        }
    }

    /**
     * HTTP lisenner through ipn when transaction create.
     *
     * @param  Request $request
     * @return mixed
     */
    public function ipn(Request $request)
    {
        //Received all the payement information from the gateway
        if ($request->input('tran_id')) { //Check transation id is posted or not.
            $tran_id = $request->input('tran_id');

            //Check order status in order tabel against the transaction id or order id.
            $order_details = Order::findOrderByTranId($tran_id);

            $ipnLog = SslIpnLog::firstOrCreate(
                ['tran_id' => $tran_id],
                array_merge($request->only('tran_id', 'tran_date', 'amount', 'bank_tran_id', 'status'), ['additional_data' => $request->all()])
            );

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($tran_id, $order_details->amount, $order_details->currency, $request->all());
                if ($validation == true) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    Order::updateOrderStatus($tran_id, 'Processing');
                    return true; //Transaction is successfully Completed
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    Order::updateOrderStatus($tran_id, 'Failed');

                    return 'validation Fail';
                }
            } elseif ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
                //That means Order status already updated. No need to udate database.
                return true;
            } else {
                //That means something wrong happened. You can redirect customer to your product page.
                return 'Invalid Transaction';
            }
        } else {
            return 'Invalid Data';
        }
    }

    /**
     * Redirect url for frontend page.
     */
    protected function redirectTo($url = null, $isWeb = false)
    {
        return redirect()->to('/payment-callback' . ($url ? '/' . $url : null));
    }

    /**
     * Create order for mobile app.
     */
    public function makeOrder(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        try {
            $player = Player::select('id', 'first_name', 'last_name', 'phone', 'address', 'email')->find($request->user_id);
            $post_data = [];
            $post_data['total_amount'] = $request->price; // You cant not pay less than 10
            $post_data['currency'] = 'BDT';
            $post_data['tran_id'] = uniqid(); // tran_id must be unique

            $order = Order::where('transaction_id', $post_data['tran_id'])->updateOrCreate(
                [
                    'user_id' => $user->id,
                    'transaction_id' => $post_data['tran_id']
                ],
                [
                    'name' => $user->fullName(),
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'amount' => $post_data['total_amount'],
                    'status' => 'Pending',
                    'address' => $user->address,
                    'currency' => $post_data['currency']
                ]
            );

            return response()->json([
                'transaction_id' => $order->transaction_id,
                'amount' => $order->amount
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Order Complete from mobile app.
     *
     * @param $request
     * @return mix
     */
    public function orderComplete(Request $request)
    {
        try {
            if (($msg = $this->ipn($request)) !== true) {
                return response()->json(['message' => $msg], 400);
            }

            return respondSuccess('Registration fee successfully paid.');
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
