<div>
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left custom-breadcrumb bg-overlay-white-30 bg-image" data-bs-bg="{{ asset('/assets/frontend/img/components/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Flat Details</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li>
                                    <a href="{{ url('/flats') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Flats</a>
                                </li>
                                <li>Flat Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
    <div class="ltn__img-slider-area mb-90">
        <div class="container-fluid">
            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                @foreach($flat->lotPictures as $picture)
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="{{ asset($picture->path) }}" data-rel="lightcase:myCollection">
                            <img src="{{ asset($picture->path) }}" alt="Flat Picture" class="flat-details-slider-img">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- IMAGE SLIDER AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <!-- <li class="ltn__blog-category">
                                    <a href="javascript:void(0)">Featured</a>
                                </li> -->

                                <li class="ltn__blog-category">
                                    @if($flat->status == 'rented')
                                    <a class="sale-badge bg-green--" href="javascript:void(0)">Rented</a>
                                    @else
                                    <a class="sale-badge bg-green" href="javascript:void(0)">For Rent</a>
                                    @endif
                                </li>

                                <li class="ltn__blog-category">
                                    <h5 class="ltn__secondary-color">
                                        <span>&#2547; {{ floor($flat->price) }}<label>/{{ ucwords($flat->rent_type) }}</label></span>
                                    </h5>
                                </li>

                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i> {{ dateFormat($flat->created_at) }}
                                </li>

                                <li>
                                    <a href="javascript:void(0)"><i class="far fa-comments"></i>{{ count($flat->comments) }} Comments</a>
                                </li>
                            </ul>
                        </div>

                        <h1>{{ $flat->name }}</h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> {{ $flat->address }}</label>
                        <h4 class="title-2">Description</h4>
                        <p>
                            {{ $flat->description }}
                        </p>

                        <h4 class="title-2">Property Detail</h4>  
                        <div class="property-detail-info-list section-bg-1 clearfix mb-60">                          
                            <ul>
                                <li><label>Property ID:</label> <span>{{ $flat->property_id }}</span></li>
                                <li><label>Home Area: </label> <span>{{ $flat->home_area }} sqft</span></li>
                                <li><label>Rooms:</label> <span>{{ $flat->rooms }}</span></li>
                                <li><label>Baths:</label> <span>{{ $flat->baths }}</span></li>
                                <li><label>Year built:</label> <span>{{ $flat->built }}</span></li>
                            </ul>
                            <ul>
                                <li><label>Type:</label> <span class="text-capitalize">{{ $flat->type }} </span></li>
                                <li><label>Lot Area:</label> <span>{{ $flat->lot_area }} sqft</span></li>
                                <li><label>Beds:</label> <span>{{ $flat->beds }}</span></li>
                                <li><label>Price:</label> <span>&#2547; {{ floor($flat->price) }}</span></li>
                                <li><label>Property Status:</label> <span>@if($flat->status == 'rented') Rented @else For Rent @endif
                            </ul>
                        </div>

                        <h4 class="title-2 mb-10">Amenities</h4>
                        <div class="property-details-amenities mb-60">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            @if(in_array('ac', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Air Conditioning
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif

                                            @if(in_array('gym', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Gym
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif

                                            @if(in_array('microwave', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Microwave
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif

                                            @if(in_array('swimming-pool', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Swimming Pool
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            @if(in_array('wifi', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">WiFi
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif

                                            @if(in_array('barbeque', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Barbeque
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif

                                            @if(in_array('recreation', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Recreation
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif

                                            @if(in_array('fridge', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Refrigerator
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            @if(in_array('washer', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Washer
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif

                                            @if(in_array('security', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">24x7 Security
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif

                                            @if(in_array('court', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Basketball Cout
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif

                                            @if(in_array('fireplace', $flat->amenities))
                                            <li>
                                                <label class="checkbox-item">Fireplace
                                                    <input type="checkbox" disabled checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="title-2">Location</h4>
                        <div class="property-details-google-map mb-60">
                            <iframe
                                width="100%" 
                                height="100%"
                                style="border:0"
                                loading="lazy"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD3bjmSKddbmjN0Yml0-kOmP1fZ50cRfA0
                                    &q={{ $flat->address }}">
                            </iframe>
                        </div>
                        
                        <div class="ltn__shop-details-tab-content-inner--- ltn__shop-details-tab-inner-2 ltn__product-details-review-inner mb-60">
                            <h4 class="title-2">Customer Reviews</h4>
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="javascript:void(0)"><i class="fas fa-star"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fas fa-star"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fas fa-star"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="far fa-star"></i></a></li>
                                    <li class="review-total fw-600"> <a href="javascript:void(0)"> ( {{ count($flat->comments) }} Reviews )</a></li>
                                </ul>
                            </div>
                            <hr>
                            <!-- comment-area -->
                            <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul>
                                        @php $totalRattings = 0; @endphp
                                        @foreach($flat->comments as $comment)
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    @if($comment->avatar)
                                                    <img src="{{ asset($comment->avatar) }}" alt="Image">
                                                    @else
                                                    <img src="{{ asset('/assets/frontend/img/testimonial/1.jpg') }}" alt="Image">
                                                    @endif
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="javascript:void(0)">{{ $comment->full_name }}</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            @php $remaining = (5 - $comment->rattings);  $totalRattings += $comment->rattings; @endphp

                                                            @for($i = 1; $i <= $comment->rattings; $i++)
                                                            <li><a href="javascript:void(0)"><i class="fas fa-star"></i></a></li>
                                                            @endfor

                                                            @for($i = 1; $i <= $remaining; $i++)
                                                            <li><a href="javascript:void(0)"><i class="far fa-star"></i></a></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <p>
                                                        {{ $comment->comments }}
                                                    </p>
                                                    <span class="ltn__comment-reply-btn">{{ dateFormat($comment->created_at, 'F d, Y') }}</span>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- comment-reply -->
                            <!-- <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                <form action="#">
                                    <h4>Add a Review</h4>
                                    <div class="mb-30">
                                        <div class="add-a-review">
                                            <h6>Your Ratings:</h6>
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea placeholder="Type your comments...."></textarea>
                                    </div>

                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" placeholder="Type your name....">
                                    </div>

                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" placeholder="Type your email....">
                                    </div>

                                    <div class="input-item input-item-website ltn__custom-icon">
                                        <input type="text" name="website" placeholder="Type your website....">
                                    </div>

                                    <label class="mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label>
                                    <div class="btn-wrapper">
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                        <!-- Author Widget -->
                        <div class="widget ltn__author-widget">
                            <div class="ltn__author-widget-inner text-center">
                                @if($flat->owner->avatar)
                                <img src="{{ asset('/assets/frontend/img/components/landlord.jpg') }}" alt="Image">
                                @else
                                <img src="{{ asset('/assets/frontend/img/components/landlord.jpg') }}" alt="Image">
                                @endif

                                <h5 class="m-0"> {{ $flat->owner->first_name }} {{ $flat->owner->last_name }} </h5>
                                <small class="px-3 py-1 br-6 bg-orange">{{ $flat->owner->profession }}</small>

                                <p class="mt-3">
                                    {{ $flat->owner->about   }}
                                </p>
                                <div class="ltn__social-media">
                                    <ul>
                                        <li><a href="{{ optional($flat->owner->social_links)->facebook }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ optional($flat->owner->social_links)->twitter }}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ optional($flat->owner->social_links)->linkedin }}" target="_blank" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="{{ optional($flat->owner->social_links)->instagram }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        @if($flat->status != 'rented' && optional(auth()->user())->role != 'landlord')
                        <!-- Search Widget -->
                        <div class="widget ltn__search-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2 text-unset">Start with this property</h4>
                            <a type="button" wire:click="bookApartment" class="btn theme-btn-1 btn-block">BOOK APARTMENT</a>
                        </div>
                        @endif

                        <!-- Social Media Widget -->
                        <div class="widget ltn__social-media-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Follow us</h4>
                            <div class="ltn__social-media-2">
                                <ul>
                                    <li><a href="{{ optional(orgInfo()->social_links)->facebook }}" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ optional(orgInfo()->social_links)->twitter }}" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ optional(orgInfo()->social_links)->linkedin }}" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="{{ optional(orgInfo()->social_links)->instagram }}" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center---">
                        <h1 class="section-title">Related Properties</h1>
                    </div>
                </div>
            </div>

            <div class="row ltn__related-product-slider-two-active slick-arrow-1">
                <!-- ltn__product-item -->
                @foreach($relatedProperties as $flat)
                <!-- {{ $flat }} -->
                <div class="col-xl-6 col-sm-6 col-12">
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
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->
</div>
