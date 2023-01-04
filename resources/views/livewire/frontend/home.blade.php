<div>
    <x-slot name="title">Home</x-slot>

    <!-- SLIDER AREA START -->
    <div class="ltn__slider-area ltn__slider-3 section-bg-2">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60" data-bs-bg="{{ asset('/assets/frontend/img/slider/11.jpg') }}">
                <div class="ltn__slide-item-inner text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <h6 class="slide-sub-title white-color--- animated">
                                            <span><i class="fas fa-home"></i></span> Real Estate Agency
                                        </h6>
                                        <h1 class="slide-title animated">
                                            Find Your Dream <br />
                                            House By Us
                                        </h1>
                                        <div class="slide-brief animated">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
                                            </p>
                                        </div>
                                        <div class="btn-wrapper animated">
                                            <a href="shop.html" class="theme-btn-1 btn btn-effect-1">Make An Enquiry</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60" data-bs-bg="{{ asset('/assets/frontend/img/slider/12.jpg') }}">
                <div class="ltn__slide-item-inner text-right text-end">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <h6 class="slide-sub-title white-color--- animated">
                                            <span><i class="fas fa-home"></i></span> Real Estate Agency
                                        </h6>
                                        <h1 class="slide-title animated">
                                            Find Your Dream <br />
                                            House By Us
                                        </h1>
                                        <div class="slide-brief animated">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
                                            </p>
                                        </div>
                                        <div class="btn-wrapper animated">
                                            <a href="shop.html" class="theme-btn-1 btn btn-effect-1">Make An Enquiry</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60" data-bs-bg="{{ asset('/assets/frontend/img/slider/13.jpg') }}">
                <div class="ltn__slide-item-inner text-left">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <h6 class="slide-sub-title white-color--- animated">
                                            <span><i class="fas fa-home"></i></span> Real Estate Agency
                                        </h6>
                                        <h1 class="slide-title animated">
                                            Find Your Dream <br />
                                            House By Us
                                        </h1>
                                        <div class="slide-brief animated">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
                                            </p>
                                        </div>
                                        <div class="btn-wrapper animated">
                                            <a href="shop.html" class="theme-btn-1 btn btn-effect-1">Make An Enquiry</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- FILTER AREA START -->
    <div class="ltn__car-dealer-form-area section-bg-1 mt--65 pb-115---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__car-dealer-form-tab">
                        <div class="tab-content bg-white box-shadow-1 ltn__border position-relative pb-10 br-3">
                            <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                <div class="car-dealer-form-inner">
                                    <form action="{{ url('/flats') }}" class="ltn__car-dealer-form-box row">
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-car---- col-lg-3 col-md-6">
                                            <select class="nice-select" name="location">
                                                <option value="" disabled selected>Choose Area</option>
                                                @foreach($locationOptions as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-3 col-md-6">
                                            <select class="nice-select" name="type">
                                                <option value="" disabled selected>Property Type</option>
                                                <option value="apartment">Apartment</option>
                                                <option value="duplex">Duplex</option>
                                                <option value="villa">Villa</option>
                                                <option value="building">Building</option>
                                            </select>
                                        </div>

                                        <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-meter---- col-lg-3 col-md-6">
                                            <select class="nice-select" name="status">
                                                <option value="" disabled selected>Property Status</option>
                                                <option value="for rent">Open house</option>
                                                <option value="rented">Rent</option>
                                                <!-- <option>Sale</option> -->
                                            </select>
                                        </div>
                                        
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">
                                            <div class="btn-wrapper text-center mt-0">
                                                <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Find Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FILTER AREA END -->

    <!-- SEARCH BY PLACE AREA START -->
    <div class="ltn__search-by-place-area section-bg-1 before-bg-top--- bg-image-top--- pt-115 pb-70" data-bs-bg="img/bg/20.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">
                            Area Properties
                        </h6>
                        <h1 class="section-title">Popular Locations</h1>
                    </div>
                </div>
            </div>

            <div class="row ltn__search-by-place-slider-1-active slick-arrow-1">
                @foreach($locations as $location)
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="{{ url('/flats?location='. $location->id) }}">
                                @if($location->file_path)
                                <img src="{{ asset($location->file_path) }}" alt="Location" class="location-img" />
                                @else
                                <img src="{{ asset('/assets/frontend/img/locations/default.jpg') }}" alt="Location" class="location-img" />
                                @endif
                            </a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>{{ $location->lots_count }} Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="{{ url('/flats?location='. $location->id) }}">{{ $location->name }}</a></h6>
                            <h4>
                                <a href="{{ url('/flats?location='. $location->id) }}">{{ $location->address }}</a>
                            </h4>
                            <!-- <div class="search-by-place-btn">
                                <a href="{{ url('/flats?location='. $location->id) }}">View Properties <i class="flaticon-right-arrow"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- SEARCH BY PLACE AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pt-115 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">
                            Properties
                        </h6>
                        <h1 class="section-title">Featured Listings</h1>
                    </div>
                </div>
            </div>
            
            <div class="row ltn__product-slider-item-three-active slick-arrow-1">
                <!-- ltn__product-item -->
                @foreach($featureFlats as $flat)
                <!-- {{ $flat }} -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="{{ url('/flat/' . $flat->id) }}">
                                @if($flat->lotPictures)
                                <img src="{{ asset(optional($flat->lotPictures)[0]->path) }}" class="lot-img" alt="#" />
                                @else
                                <img src="{{ asset('/assets/frontend/img/lots/default.jpg') }}" class="lot-img" alt="#" />
                                @endif
                            </a>

                            <div class="product-badge">
                                <ul>
                                    @if($flat->status == 'rented')
                                    <li class="sale-badge bg-green--">{{ $flat->status }}</li>
                                    @else
                                    <li class="sale-badge bg-green">For Rent</li>
                                    @endif
                                </ul>
                            </div>

                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="{{ url('/flats?location='. $flat->location_id) }}">
                                                <i class="flaticon-pin"></i> {{ $flat->location->name }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="{{ url('/flat/' . $flat->id) }}">
                                                <i class="fas fa-camera"></i> {{ count($flat->lotPictures) }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="product-info">
                            <div class="product-price">
                                <span>&#2547; {{ floor($flat->price) }}<label>/{{ ucwords($flat->rent_type) }}</label></span>
                            </div>
                            <h2 class="product-title text-truncate">
                                <a href="{{ url('/flat/' . $flat->id) }}">{{ $flat->name }}</a>
                            </h2>
                            <div class="product-description home">
                                <p>
                                    {{ $flat->description }}
                                </p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li>
                                    <span>{{ $flat->beds }} <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li>
                                    <span>{{ $flat->baths }} <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li>
                                    <span>{{ $flat->lot_area }} <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="product-info-bottom">
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#" class="lot-picture" /></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal"> <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->

    <!-- COUNTER UP AREA START -->
    <div class="ltn__counterup-area section-bg-1 pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-select"></i>
                        </div>
                        <h1>
                            <span class="counter">{{ $counter['area'] }}</span><span class="counterUp-letter">K</span><span class="counterUp-icon">+</span> 
                        </h1>
                        <h6>Total Area Sq</h6>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-office"></i>
                        </div>
                        <h1>
                            <span class="counter">{{ $counter['apartment'] }}</span><span class="counterUp-icon">+</span> 
                        </h1>
                        <h6>Apartments</h6>
                    </div>
                </div>
                <!-- <div class="col-md-3 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-user"></i>
                        </div>
                        <h1><span class="counter">{{ $counter['landlord'] }}</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Total Landlord</h6>
                    </div>
                </div> -->
                <div class="col-md-4 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-house"></i>
                        </div>
                        <h1><span class="counter">{{ $counter['tenant'] }}</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Satisfied Tenants</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COUNTER UP AREA END -->

    <!-- TESTIMONIAL AREA START -->
    <div class="ltn__testimonial-area ltn__testimonial-4 pt-115 pb-100 plr--9">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">
                            Our Testimonial
                        </h6>
                        <h1 class="section-title">Clients Feedback</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__testimonial-slider-4 ltn__testimonial-slider-4-active slick-arrow-1">
                        <div class="ltn__testimonial-item-5">
                            <div class="ltn__quote-icon">
                                <i class="far fa-comments"></i>
                            </div>
                            <div class="ltn__testimonial-image">
                                <img src="{{ asset('/assets/frontend/img/testimonial/1.jpg') }}" alt="quote" class="testimonial-img" />
                            </div>
                            <div class="ltn__testimonial-info">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud ullamco laboris nisi ut aliquip
                                    ex ea commodo.
                                </p>
                                <h4>Jacob William</h4>
                                <h6>Manager</h6>
                            </div>
                        </div>
                        <div class="ltn__testimonial-item-5">
                            <div class="ltn__quote-icon">
                                <i class="far fa-comments"></i>
                            </div>
                            <div class="ltn__testimonial-image">
                                <img src="{{ asset('/assets/frontend/img/testimonial/2.jpg') }}" alt="quote" class="testimonial-img" />
                            </div>
                            <div class="ltn__testimonial-info">
                                <p>
                                    Quidem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud ullamco laboris nisi ut
                                    aliquip ex ea.
                                </p>
                                <h4>Ethan James</h4>
                                <h6>Admin</h6>
                            </div>
                        </div>

                        <div class="ltn__testimonial-item-5">
                            <div class="ltn__quote-icon">
                                <i class="far fa-comments"></i>
                            </div>
                            <div class="ltn__testimonial-image">
                                <img src="{{ asset('/assets/frontend/img/testimonial/3.jpg') }}" alt="quote" class="testimonial-img" />
                            </div>
                            <div class="ltn__testimonial-info">
                                <p>
                                    Dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud ullamco nisi ut aliquip ex
                                    ea commodo.
                                </p>
                                <h4>Noah Alexander</h4>
                                <h6>Professor</h6>
                            </div>
                        </div>

                        <div class="ltn__testimonial-item-5">
                            <div class="ltn__quote-icon">
                                <i class="far fa-comments"></i>
                            </div>
                            <div class="ltn__testimonial-image">
                                <img src="{{ asset('/assets/frontend/img/testimonial/4.jpg') }}" alt="quote" class="testimonial-img" />
                            </div>
                            <div class="ltn__testimonial-info">
                                <p>
                                    Amet Ipsum Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea
                                    commodo.
                                </p>
                                <h4>Liam Mason</h4>
                                <h6>Officer</h6>
                            </div>
                        </div>
                    </div>
                    <ul class="ltn__testimonial-quote-menu d-none d-lg-block">
                        <li><img src="{{ asset('/assets/frontend/img/testimonial/1.jpg') }}" alt="Quote image" /></li>
                        <li><img src="{{ asset('/assets/frontend/img/testimonial/2.jpg') }}" alt="Quote image" /></li>
                        <li><img src="{{ asset('/assets/frontend/img/testimonial/3.jpg') }}" alt="Quote image" /></li>
                        <li><img src="{{ asset('/assets/frontend/img/testimonial/4.jpg') }}" alt="Quote image" /></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL AREA END -->

    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="img/1.jpg--">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                        <div class="coll-to-info text-color-white">
                            <h1>Looking for a dream home?</h1>
                            <p>We can help you realize your dream of a new home</p>
                        </div>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-3 btn-white text-uppercase fw-600" href="{{ url('/contact') }}">Contact With Us <i class="icon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->
</div>
