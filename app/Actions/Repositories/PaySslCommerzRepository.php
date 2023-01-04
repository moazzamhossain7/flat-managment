<?php

namespace App\Actions\Repositories;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Library\SslCommerz\SslCommerzNotification;

class PaySslCommerzRepository
{
    public function pay(array $customer)
    {
        $post_data = [];
        $post_data['total_amount'] = $customer['total_amount']; // You cant not pay less than 10
        $post_data['currency'] = 'BDT';
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        // CUSTOMER INFORMATION
        $post_data['cus_name'] = $customer['name'] ?? 'N/A';
        $post_data['cus_email'] = $customer['email'] ?? 'no-mail@crickmatch.com';
        $post_data['cus_add1'] = $customer['address'] ?? 'N/A';
        $post_data['cus_add2'] = '';
        $post_data['cus_city'] = '';
        $post_data['cus_state'] = '';
        $post_data['cus_postcode'] = '';
        $post_data['cus_country'] = 'Bangladesh';
        $post_data['cus_phone'] = $customer['phone'];
        $post_data['cus_fax'] = '';

        // SHIPMENT INFORMATION
        $post_data['ship_name'] = 'AR Properties';
        $post_data['ship_add1'] = 'Sukrabad, Dhaka, Bangladesh';
        $post_data['ship_add2'] = 'Dhaka';
        $post_data['ship_city'] = 'Dhaka';
        $post_data['ship_state'] = 'Dhaka';
        $post_data['ship_postcode'] = '1000';
        $post_data['ship_phone'] = '';
        $post_data['ship_country'] = 'Bangladesh';

        $post_data['shipping_method'] = 'NO';
        $post_data['product_name'] = 'AR Properties';
        $post_data['product_category'] = 'Property';
        $post_data['product_profile'] = 'ar-properties';

        //Before  going to initiate the payment order status need to update as Pending.
        $update_product = Order::updateOrCreate(
            ['transaction_id' => $post_data['tran_id']],    
            [
                'user_id' => $customer['user_id'],
                'lot_id' => $customer['lot_id'],
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'currency' => $post_data['currency'],
                'pay_for' => $customer['pay_for'] ?? 'initial-rent',
                'payload' => $customer['payload'] ?? null,
                'is_backend_payment' => $customer['is_web'] ? true : false
            ]
        );

        $sslc = new SslCommerzNotification();
        // initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = [];
        }
    }
}
