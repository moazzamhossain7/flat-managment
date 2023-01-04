<div>
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left custom-breadcrumb bg-overlay-white-30 bg-image" data-bs-bg="{{ asset('/assets/frontend/img/components/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Flats</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a>
                                </li>
                                <li>Flat List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-100 mt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>

                            <li>
                               <div class="short-by text-center">
                                    <select class="nice-select border-1">
                                        <option>Default sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div> 
                            </li>

                            <li>
                               <div class="showing-product-number text-right">
                                    <span>Showing 9 of 20 results</span>
                                </div> 
                            </li>
                        </ul>
                    </div> -->

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input class="custom-search" wire:model="filters.search" type="text" name="search" placeholder="Search your keyword...">
                                                <!-- <button type="submit"><i class="fas fa-search"></i></button> -->
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <!-- ltn__product-item -->
                                    @forelse ($lots as $flat)
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="ltn__product-item ltn__product-item-4 text-center---">
                                                <div class="product-img">
                                                    <a href="{{ url('/flat/' . $flat->id) }}">
                                                        @if(count($flat->lotPictures) > 0)
                                                        <img src="{{ asset(optional($flat->lotPictures)[0]->path) }}" class="lot-img" alt="#" />
                                                        @else
                                                        <img src="{{ asset('/assets/frontend/img/lots/default.jpg') }}" class="lot-img" alt="#" />
                                                        @endif
                                                    </a>

                                                    <div class="product-badge custom">
                                                        <ul>
                                                            @if($flat->status == 'rented')
                                                            <li class="sale-badge bg-green--">{{ $flat->status }}</li>
                                                            @else
                                                            <li class="sale-badge bg-green">For Rent</li>
                                                            @endif
                                                        </ul>

                                                        <div class="real-estate-agent">
                                                            <div class="agent-img">
                                                                <a href="javascript:void(0)">
                                                                    @if($flat->owner->avatar)
                                                                    <img src="{{ asset($flat->owner->avatar) }}" alt="#" class="owner-img">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="product-img-location-gallery">
                                                        <div class="product-img-location">
                                                            <ul>
                                                                <li>
                                                                    <a href="javascript:void(0)">
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
                                    @empty
                                        <h2 class="text-center">No flats found...</h2>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ $lots->links() }}  
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
</div>
