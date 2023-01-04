<div>
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left custom-breadcrumb bg-overlay-white-30 bg-image" data-bs-bg="{{ asset('/assets/frontend/img/components/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Checkout</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a>
                                </li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ltn__checkout-payment-method mt-50">
                        <h4 class="title-2">Payment Method</h4>
                        <div id="checkout_accordion_1">
                            <!-- card -->
                            <div class="card">
                                <h5 class="ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-2" aria-expanded="true"> 
                                    Cash on hand
                                </h5>
                                <div id="faq-item-2-2" class="collapse show" data-bs-parent="#checkout_accordion_1">
                                    <div class="card-body">
                                        <p>Pay with cash upon hand.</p>
                                    </div>

                                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase mt-20" type="button" wire:click="cashPayment">
                                        Place order
                                    </button>
                                </div>
                            </div>

                            <!-- card -->
                            <div class="card">
                                <h5 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-3" aria-expanded="false" >
                                    SSL Commerz <img src="{{ asset('/assets/frontend/img/components/payment.png') }}" alt="#">
                                </h5>
                                <div id="faq-item-2-3" class="collapse" data-bs-parent="#checkout_accordion_1">
                                    <div class="card-body">
                                        <p>Pay via SSL Commerz; you can pay with your credit card if you don’t have a PayPal account.</p>
                                    </div>

                                    <button
                                        type="button"
                                        class="btn theme-btn-1 btn-effect-1 text-uppercase mt-20"
                                        id="sslczPayBtn"
                                        postdata="{}"
                                        token="{{ $token }}"
                                        order="{{ $order }}"
                                        endpoint="{{ url('/pay-via-ajax?flat='.$flat->id) }}">
                                        Pay Now
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="ltn__payment-note mt-20 mb-30">
                            <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="shoping-cart-total mt-50">
                        <h4 class="title-2">Property Details</h4>
                        <table class="table padding-table">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <strong>{{ $flat->name }}</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Address</td>
                                    <td class="text-right">
                                        <strong><small>{{ $flat->address }}</small></strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-nowrap">Total Rooms</td>
                                    <td class="text-right">
                                        <strong>{{ $flat->rooms }}</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Bedrooms</td>
                                    <td class="text-right">
                                        <strong>{{ $flat->beds }}</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Bathrooms</td>
                                    <td class="text-right">
                                        <strong>{{ $flat->baths }}</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Lot Area</td>
                                    <td class="text-right">
                                        <strong>{{ $flat->lot_area }}</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Price</strong></td>
                                    <td class="text-right"><strong>&#2547; {{ floor($flat->price) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->
    <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>

</div>
