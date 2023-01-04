@php $segments = Request::segments(); $path = count($segments) > 0 ? $segments[0] : '/';  @endphp

<!-- HEADER AREA START -->
@if($path == '/')
<header class="ltn__header-area ltn__header-5 ltn__header-logo-and-mobile-menu-in-mobile ltn__header-logo-and-mobile-menu ltn__header-transparent gradient-color-4---">
@else
<header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
@endif
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area top-area-color-white">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li>
                                <a href="mailto:{{ orgInfo()->email }}"><i class="icon-mail"></i> {{ orgInfo()->email }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/contact') }}"><i class="icon-placeholder"></i> {{ orgInfo()->address }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <!-- ltn__language-menu -->
                                    <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                        <ul>
                                            <li>
                                                <a href="#" class="dropdown-toggle"><span class="active-currency">English</span></a>
                                                <!-- <ul>
                                                    <li><a href="#">Bengali</a></li>
                                                    <li><a href="#">Chinese</a></li>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                </ul> -->
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li>
                                                <a href="{{ optional(orgInfo()->social_links)->facebook }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ optional(orgInfo()->social_links)->twitter }}" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                            </li>

                                            <li>
                                                <a href="{{ optional(orgInfo()->social_links)->instagram }}" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ optional(orgInfo()->social_links)->linkedin }}" title="Linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky @if($path == '/') ltn__sticky-bg-black @else ltn__sticky-bg-white @endif">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="{{ url('/') }}">
                                @if($path == '/')
                                <img src="{{ asset('/assets/frontend/img/components/logo-2.png') }}" alt="Logo" />
                                @else
                                <img src="{{ asset('/assets/frontend/img/components/logo.png') }}" alt="Logo" />
                                @endif
                            </a>
                        </div>
                        <div class="get-support clearfix d-none">
                            <div class="get-support-icon">
                                <i class="icon-call"></i>
                            </div>
                            <div class="get-support-info">
                                <h6>Get Support</h6>
                                <h4><a href="tel:{{ orgInfo()->phone }}">{{ orgInfo()->phone }}</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col header-menu-column @if($path == '/') menu-color-white @endif">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/flats') }}">Flats</a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/about') }}">About Us</a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/contact') }}">Contact Us</a>
                                    </li>
                                    
                                    <li>
                                        @if(auth()->check())
                                        <a href="{{ url('/dashboard') }}">
                                            <span class="br-6 border-1 px-15 py-8">
                                                <i class="icon-user"></i> {{ auth()->user()->fullName() }}
                                            </span>
                                        </a>
                                        @else
                                        <a href="{{ url('/login') }}"><i class="icon-user"></i></a>
                                        @endif
                                    </li>

                                    @if(! auth()->check())
                                    <li class="special-link">
                                        <a href="{{ url('/register') }}">Register</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="col--- ltn__header-options ltn__header-options-2">
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
<!-- HEADER AREA END -->

{{-- @include('layouts.frontend.cart') --}}

<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('/assets/frontend/img/logo.png') }}" alt="Logo" /></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>

        <div class="ltn__utilize-menu">
            <ul>
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>

                <li>
                    <a href="{{ url('/flats') }}">Flats</a>
                </li>

                <li>
                    <a href="{{ url('/about') }}">About Us</a>
                </li>

                <li>
                    <a href="{{ url('/contact') }}">Contact Us</a>
                </li>
            </ul>
        </div>

        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
                <li>
                    <a href="{{ url('/login') }}" title="My Account">
                        <span class="utilize-btn-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        Login
                    </a>
                </li>

                <li>
                    <a href="{{ url('/register') }}" title="Wishlist">
                        <span class="utilize-btn-icon">
                            <i class="far fa-user"></i>
                        </span>
                        Register
                    </a>
                </li>
            </ul>
        </div>

        <div class="ltn__social-media-2">
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
<!-- Utilize Mobile Menu End -->