<!-- FOOTER AREA START -->
<footer class="ltn__footer-area">
    <div class="footer-top-area section-bg-2 plr--5">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-about-widget">
                        <div class="footer-logo">
                            <div class="site-logo">
                                <img src="{{ asset('/assets/frontend/img/components/logo-2.png') }}" alt="Logo" />
                            </div>
                        </div>
                        <p>
                            Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.
                        </p>
                        <div class="footer-address">
                            <ul>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-placeholder"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>{{ orgInfo()->address }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-call"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="tel:{{ orgInfo()->phone }}">{{ orgInfo()->phone }}</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>
                                            <a href="mailto:{{ orgInfo()->email }}">{{ orgInfo()->email }}</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ltn__social-media mt-20">
                            <ul>
                                <li>
                                    <a href="{{ optional(orgInfo()->social_links)->facebook }}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>

                                <li>
                                    <a href="{{ optional(orgInfo()->social_links)->twitter }}" title="Twitter"><i class="fab fa-twitter"></i></a>
                                </li>

                                <li>
                                    <a href="{{ optional(orgInfo()->social_links)->instagram }}" title="Instagram"><i class="fab fa-instagram"></i></a>
                                </li>

                                <li>
                                    <a href="{{ optional(orgInfo()->social_links)->linkedin }}" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Company</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ url('/about') }}">About</a></li>
                                <li><a href="javascript:void(0)">Blog</a></li>
                                <li><a href="{{ url('/flats') }}">All Flats</a></li>
                                <li><a href="javascript:void(0)">Locations Map</a></li>
                                <li><a href="javascript:void(0)">FAQ</a></li>
                                <li><a href="{{ url('/contact') }}">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Customer Care</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">My account</a></li>
                                <li><a href="javascript:void(0)">Wish List</a></li>
                                <li><a href="javascript:void(0)">FAQ</a></li>
                                <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ url('/terms-condition') }}">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget footer-newsletter-widget">
                        <h4 class="footer-title">Newsletter</h4>
                        <p>
                            Subscribe to our weekly Newsletter and receive updates via email.
                        </p>
                        <div class="footer-newsletter">
                            <form action="#">
                                <input type="email" class="br-6 height-52" name="email" placeholder="Email*" />
                                <div class="btn-wrapper">
                                    <button class="theme-btn-1 btn" type="submit">
                                        <i class="fas fa-location-arrow"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <h5 class="mt-30">We Accept</h5>
                        <img src="{{ asset('/assets/frontend/img/components/payment.png') }}" alt="Payment Image" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__copyright-area ltn__copyright-2 section-bg-7 plr--5">
        <div class="container-fluid ltn__border-top-2">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="ltn__copyright-design clearfix">
                        <p>
                            All Rights Reserved @Parallax Programmer
                            <span class="current-year"></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-12 align-self-center">
                    <div class="ltn__copyright-menu text-end">
                        <ul>
                            <li><a href="{{ url('/terms-condition') }}">Terms & Conditions</a></li>
                            <li><a href="{{ url('/privacy-policy') }}">Privacy & Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER AREA END -->