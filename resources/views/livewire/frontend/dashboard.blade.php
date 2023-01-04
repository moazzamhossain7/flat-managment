<div>
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left custom-breadcrumb bg-overlay-white-30 bg-image" data-bs-bg="{{ asset('/assets/frontend/img/components/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">My Account</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a>
                                </li>
                                <li>Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- WISHLIST AREA START -->
    <div class="liton__wishlist-area pb-70 mt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- PRODUCT TAB AREA START -->
                    <div class="ltn__product-tab-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="ltn__tab-menu-list mb-50">
                                        <div class="nav">                                            
                                            <a class="@if($currentTab == 'dashboard') active show @endif" data-bs-toggle="tab" href="#dashboard" wire:click="changeTab('dashboard')">
                                                Dashboard <i class="fas fa-home"></i>
                                            </a>

                                            <a class="@if($currentTab == 'profile') active show @endif" data-bs-toggle="tab" href="#profile" wire:click="changeTab('profile')">
                                                Profiles <i class="fas fa-user"></i>
                                            </a>

                                            <a class="@if($currentTab == 'properties') active show @endif" data-bs-toggle="tab" href="#properties" wire:click="changeTab('properties')">
                                                My Properties <i class="fa-solid fa-list"></i>
                                            </a>

                                            @can('visible', 'landlord')
                                            <a class="@if($currentTab == 'add_property') active show @endif" data-bs-toggle="tab" href="#add_property" wire:click="changeTab('add_property')">
                                                Add Property <i class="fa-solid fa-map-location-dot"></i>
                                            </a>
                                            @endcan

                                            <a class="@if($currentTab == 'notification') active show @endif" data-bs-toggle="tab" href="#notification" wire:click="changeTab('notification')">
                                                Notifications <i class="fa-solid fa-money-check-dollar"></i>
                                            </a>

                                            <a class="@if($currentTab == 'accounts') active show @endif" data-bs-toggle="tab" href="#accounts" wire:click="changeTab('accounts')">
                                                Account Details <i class="fas fa-user"></i>
                                            </a>

                                            <a class="@if($currentTab == 'change_password') active show @endif" data-bs-toggle="tab" href="#change_password" wire:click="changeTab('change_password')">
                                                Change Password <i class="fa-solid fa-lock"></i>
                                            </a>

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            </form>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); $(this).prev().submit();">
                                                Logout <i class="fas fa-sign-out-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-lg-8">
                                    <div class="tab-content">
                                        <div class="tab-pane fade @if($currentTab == 'dashboard') active show @endif" id="ltn_tab_1_1">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                @if(session('success'))
                                                <div class="alert alert-success" role="alert">
                                                    <h4 class="alert-heading">Well done!</h4>
                                                    <h6>{{ session('success') }}</h6>
                                                </div>
                                                @endif

                                                @if(session('error'))
                                                <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Opps!</h4>
                                                    <h6 class="text-error">{{ session('error') }}</h6>
                                                </div>
                                                @endif

                                                <p>Hello <strong>{{ $user->fullName() }}</strong> </p>
                                                <p>From your account dashboard you can view your <span>recent orders</span>, manage your <span>shipping and billing addresses</span>, and <span>edit your password and account details</span>.</p>
                                            </div>
                                        </div>
                                        
                                        <!-- profile -->
                                        <div class="tab-pane fade @if($currentTab == 'profile') active show @endif" id="ltn_tab_1_2">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <!-- comment-area -->
                                                <div class="ltn__comment-area mb-50">
                                                    <div class="ltn-author-introducing clearfix">
                                                        <div class="author-img">
                                                            @if($user->avatar)
                                                            <img src="{{ asset($user->avatar) }}" alt="Author Image">
                                                            @else
                                                            <img src="{{ asset('/assets/frontend/img/components/landlord.jpg') }}" alt="Author Image">
                                                            @endif
                                                        </div>
                                                        
                                                        <div class="author-info">
                                                            <h6>@if($user->role == 'tenant') Tenant @else Landlord @endif of Property</h6>
                                                            <h2>{{ $user->fullName() }}</h2>
                                                            <div class="footer-address">
                                                                <ul>
                                                                    <li>
                                                                        <div class="footer-address-icon">
                                                                            <i class="icon-placeholder"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p>{{ $user->address}}</p>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="footer-address-icon">
                                                                            <i class="icon-call"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p><a href="javascript:void(0)">{{ $user->phone }}</a></p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="footer-address-icon">
                                                                            <i class="icon-mail"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p><a href="javascript:void(0)">{{ $user->email }}</a></p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- my property -->
                                        @can('visible', 'landlord')
                                        <div class="tab-pane fade @if($currentTab == 'properties') active show @endif" id="ltn_tab_1_5">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="ltn__my-properties-table table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">My Properties</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">Date Added</th>
                                                                <th scope="col">Delete</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @forelse($flats as $flat)
                                                            <tr>
                                                                <td class="ltn__my-properties-img">
                                                                    <a href="{{ url('/flat/' . $flat->id) }}">
                                                                        @if(count($flat->lotPictures) > 0)
                                                                        <img src="{{ asset(optional($flat->lotPictures)[0]->path) }}" class="tenant-flat-img" alt="#" />
                                                                        @else
                                                                        <img src="{{ asset('/assets/frontend/img/lots/default.jpg') }}" class=" tenant-flat-img" alt="#" />
                                                                        @endif
                                                                    </a>
                                                                </td>

                                                                <td>
                                                                    <div class="ltn__my-properties-info">
                                                                        <h6 class="mb-10">
                                                                            <a href="{{ url('/flat/' . $flat->id) }}">
                                                                                {{ $flat->name }}
                                                                            </a>
                                                                        </h6>
                                                                        <small><i class="icon-placeholder"></i> {{ $flat->address }}</small>

                                                                        <div class="product-price ltn__secondary-color">
                                                                            <span>&#2547; {{ floor($flat->price) }}<label>/{{ ucwords($flat->rent_type) }}</label></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-truncate">{{ dateFormat($flat->created_at, 'F d, Y') }}</td>
                                                                <td class="text-center">
                                                                    <a href="javascript:void(0)" wire:click="$emit('swalConfirm', '{{ $flat->id }}')"><i class="fa-solid fa-trash-can"></i></a>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td align="center" colspan="4">No flats found....</td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @endcan

                                        <!-- my property -->
                                        @can('visible', 'tenant')
                                        <div class="tab-pane fade @if($currentTab == 'properties') active show @endif" id="ltn_tab_1_5">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="ltn__my-properties-table table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">My Properties</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">Date Added</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @forelse($tenantFlats as $tenantFlat)
                                                            <tr>
                                                                <td class="ltn__my-properties-img">
                                                                    <a href="{{ url('/flat/' . $tenantFlat->lot->id) }}">
                                                                        @if($tenantFlat->lot->lotPictures)
                                                                        <img src="{{ asset(optional($tenantFlat->lot->lotPictures)[0]->path) }}" class="tenant-flat-img" alt="#" />
                                                                        @else
                                                                        <img src="{{ asset('/assets/frontend/img/lots/default.jpg') }}" class=" tenant-flat-img" alt="#" />
                                                                        @endif
                                                                    </a>
                                                                </td>

                                                                <td>
                                                                    <div class="ltn__my-properties-info">
                                                                        <h6 class="mb-10">
                                                                            <a href="{{ url('/flat/' . $tenantFlat->lot->id) }}">
                                                                                {{ $tenantFlat->lot->name }}
                                                                            </a>
                                                                        </h6>
                                                                        <small><i class="icon-placeholder"></i> {{ $tenantFlat->lot->address }}</small>

                                                                        <div class="product-price ltn__secondary-color">
                                                                            <span>&#2547; {{ floor($tenantFlat->lot->price) }}<label>/{{ ucwords($tenantFlat->lot->rent_type) }}</label></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-truncate">{{ dateFormat($tenantFlat->created_at, 'F d, Y') }}</td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td align="center" colspan="4">No flats found....</td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @endcan

                                        <!-- add property -->
                                        @can('visible', 'landlord')
                                        <div class="tab-pane fade @if($currentTab == 'add_property') active show @endif" id="ltn_tab_1_7">
                                            <form wire:submit.prevent="addProperty" method="post">
                                                <div class="ltn__myaccount-tab-content-inner">                                                
                                                    <h6>Property Description</h6>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.name') is-invalid @enderror" 
                                                                    type="text" 
                                                                    wire:model.defer="form.name"
                                                                    name="name" 
                                                                    placeholder="Name*">
                                                                @error ('form.name')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group mb-4">
                                                                <textarea class="custom-search border-1 br-6 m-0 @error('form.description') is-invalid @enderror" 
                                                                    rows="4" 
                                                                    wire:model.defer="form.description"
                                                                    name="description" 
                                                                    placeholder="Write description*...">
                                                                </textarea>
                                                                @error ('form.description')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <h6>Property Price</h6>
                                                    <div class="row">
                                                        <div class="form-group mb-4">
                                                            <input class="custom-search m-0 @error('form.property_id') is-invalid @enderror" 
                                                                type="text" 
                                                                wire:model.defer="form.property_id"
                                                                name="property_id" 
                                                                placeholder="Property ID*">
                                                            @error ('form.property_id')
                                                                <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <input class="custom-search m-0 @error('form.price') is-invalid @enderror" 
                                                                type="number" 
                                                                wire:model.defer="form.price"
                                                                name="price" 
                                                                placeholder="Price*">
                                                            @error ('form.price')
                                                                <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <h6>Select Categories</h6>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group mb-4">
                                                                <select class="custom-search @error('form.location_id') is-invalid @enderror" wire:model.defer="form.location_id">
                                                                    <option value="" selected>Select Location</option>
                                                                    @foreach($locations as $key => $value)
                                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error ('form.location_id')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group mb-4">
                                                                <select class="custom-search @error('form.type') is-invalid @enderror" wire:model.defer="form.type">
                                                                    <option value="" selected>Select Type</option>
                                                                    <option value="apartment">Apartment</option>
                                                                    <option value="duplex">Duplex</option>
                                                                    <option value="villa">Villa</option>
                                                                    <option value="building">Building</option>
                                                                </select>
                                                                @error ('form.type')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group mb-4">
                                                                <select class="custom-search @error('form.rent_type') is-invalid @enderror" wire:model.defer="form.rent_type">
                                                                    <option value="" selected>Select Rent Type</option>
                                                                    <option value="monthly">Monthly</option>
                                                                    <option value="yearly">Yearly</option>
                                                                </select>
                                                                @error ('form.rent_type')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h6>Property Media</h6>
                                                    <input type="file" multiple id="myFile" wire:model="photos" name="filename" class="btn theme-btn-3 mb-10"><br>
                                                    @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                                                    <p>
                                                        <small>* At least 1 image is required for a valid submission. Maximum size is 2 MB</small><br>
                                                        <small>* Images might take longer to be processed.</small>
                                                    </p>

                                                    
                                                    <h6>Property Location</h6>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.address') is-invalid @enderror" 
                                                                    type="text" 
                                                                    wire:model.defer="form.address"
                                                                    name="address" 
                                                                    placeholder="Address*">
                                                                @error ('form.address')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.lat') is-invalid @enderror" 
                                                                    type="text" 
                                                                    wire:model.defer="form.lat"
                                                                    name="lat" 
                                                                    placeholder="Latitude*">
                                                                @error ('form.lat')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.lang') is-invalid @enderror" 
                                                                    type="text" 
                                                                    wire:model.defer="form.lang"
                                                                    name="lang" 
                                                                    placeholder="Longitude*">
                                                                @error ('form.lang')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h6>Property Details</h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.lot_area') is-invalid @enderror" 
                                                                    type="number" 
                                                                    wire:model.defer="form.lot_area"
                                                                    name="lot_area" 
                                                                    placeholder="Lot Area*">
                                                                @error ('form.lot_area')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.home_area') is-invalid @enderror" 
                                                                    type="number" 
                                                                    wire:model.defer="form.home_area"
                                                                    name="home_area" 
                                                                    placeholder="Home Area*">
                                                                @error ('form.home_area')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.rooms') is-invalid @enderror" 
                                                                    type="number" 
                                                                    wire:model.defer="form.rooms"
                                                                    name="rooms" 
                                                                    placeholder="Rooms*">
                                                                @error ('form.rooms')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.built') is-invalid @enderror" 
                                                                    type="number" 
                                                                    wire:model.defer="form.built"
                                                                    name="built" 
                                                                    placeholder="Built Year*">
                                                                @error ('form.built')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.beds') is-invalid @enderror" 
                                                                    type="number" 
                                                                    wire:model.defer="form.beds"
                                                                    name="beds" 
                                                                    placeholder="Bed Rooms*">
                                                                @error ('form.beds')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <input class="custom-search m-0 @error('form.baths') is-invalid @enderror" 
                                                                    type="number" 
                                                                    wire:model.defer="form.baths"
                                                                    name="baths" 
                                                                    placeholder="Bath Rooms*">
                                                                @error ('form.baths')
                                                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h6>Amenities</h6>  
                                                    <div class="row">                                
                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Air Conditioning
                                                                <input type="checkbox" wire:model.defer="amenities" name="ac" value="ac">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Gym
                                                                <input type="checkbox" wire:model.defer="amenities" name="gym" value="gym">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Microwave
                                                                <input type="checkbox" wire:model.defer="amenities" name="microwave" value="microwave">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Swimming Pool
                                                                <input type="checkbox" wire:model.defer="amenities" name="swimming-pool" value="swimming-pool">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">WiFi
                                                                <input type="checkbox" wire:model.defer="amenities" name="wifi" value="wifi">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Barbeque
                                                                <input type="checkbox" wire:model.defer="amenities" name="barbeque" value="barbeque">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Recreation
                                                                <input type="checkbox" wire:model.defer="amenities" name="recreation" value="recreation">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Refrigerator
                                                                <input type="checkbox" wire:model.defer="amenities" name="fridge" value="fridge">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Basketball Cout
                                                                <input type="checkbox" wire:model.defer="amenities" name="court" value="court">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Fireplace
                                                                <input type="checkbox" wire:model.defer="amenities" name="fireplace" value="fireplace">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">Washer
                                                                <input type="checkbox" wire:model.defer="amenities" name="washer" value="washer">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <label class="checkbox-item">24x7 Security
                                                                <input type="checkbox" wire:model.defer="amenities" name="security" value="security">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div> 

                                                    <div class="btn-wrapper text-center--- mt-30">
                                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit Property</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endcan
                                        
                                        <!-- notifications -->
                                        <div class="tab-pane fade @if($currentTab == 'notification') active show @endif" id="ltn_tab_1_8">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="row">
                                                    <!-- <div class="col-lg-6">
                                                        <div class="ltn__checkout-payment-method mt-50">
                                                            <h4 class="title-2">Payment Method</h4>
                                                            <div id="checkout_accordion_1">
                                                                <div class="card">
                                                                    <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-1" aria-expanded="false">
                                                                        Check payments
                                                                    </h5>
                                                                    <div id="faq-item-2-1" class="collapse" data-parent="#checkout_accordion_1">
                                                                        <div class="card-body">
                                                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <h5 class="ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-2" aria-expanded="true"> 
                                                                        Cash on delivery 
                                                                    </h5>
                                                                    <div id="faq-item-2-2" class="collapse show" data-parent="#checkout_accordion_1">
                                                                        <div class="card-body">
                                                                            <p>Pay with cash upon delivery.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>  

                                                                <div class="card">
                                                                    <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-3" aria-expanded="false" >
                                                                        PayPal <img src="img/icons/payment-3.png" alt="#">
                                                                    </h5>
                                                                    <div id="faq-item-2-3" class="collapse" data-parent="#checkout_accordion_1">
                                                                        <div class="card-body">
                                                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ltn__payment-note mt-30 mb-30">
                                                                <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                                            </div>
                                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>
                                                        </div>
                                                    </div> -->

                                                    <!-- <div class="col-lg-6">
                                                        <div class="shoping-cart-total mt-50">
                                                            <h4 class="title-2">Cart Totals</h4>
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>3 Rooms Manhattan <strong>× 2</strong></td>
                                                                        <td>$298.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OE Replica Wheels <strong>× 2</strong></td>
                                                                        <td>$170.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Wheel Bearing Retainer <strong>× 2</strong></td>
                                                                        <td>$150.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Shipping and Handing</td>
                                                                        <td>$15.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Vat</td>
                                                                        <td>$00.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Order Total</strong></td>
                                                                        <td><strong>$633.00</strong></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- account details -->
                                        <div class="tab-pane fade @if($currentTab == 'accounts') active show @endif" id="ltn_tab_1_4">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="ltn__form-box">
                                                    <form wire:submit.prevent="updateProfile">
                                                        <div class="row mb-10">
                                                            <div class="col-md-6">
                                                                <label>First Name:</label>
                                                                <div class="form-group mb-4">
                                                                    <input class="custom-search m-0 @error('first_name') is-invalid @enderror" 
                                                                        type="text" 
                                                                        wire:model.defer="first_name"
                                                                        name="first_name" 
                                                                        placeholder="First Name*">
                                                                    @error ('first_name')
                                                                        <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label>Last Name:</label>
                                                                <div class="form-group mb-4">
                                                                    <input class="custom-search m-0 @error('last_name') is-invalid @enderror" 
                                                                        type="text" 
                                                                        wire:model.defer="last_name"
                                                                        name="last_name" 
                                                                        placeholder="Last Name*">
                                                                    @error ('last_name')
                                                                        <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label>Email:</label>
                                                                <div class="form-group mb-4">
                                                                    <input class="custom-search m-0 @error('email') is-invalid @enderror" 
                                                                        type="email" 
                                                                        wire:model.defer="email"
                                                                        name="email" 
                                                                        placeholder="Email*">
                                                                    @error ('email')
                                                                        <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label>Phone:</label>
                                                                <div class="form-group mb-4">
                                                                    <input class="custom-search m-0 @error('phone') is-invalid @enderror" 
                                                                        type="text" 
                                                                        wire:model.defer="phone"
                                                                        name="phone" 
                                                                        placeholder="Phone*">
                                                                    @error ('phone')
                                                                        <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label>Profession:</label>
                                                                <div class="form-group mb-4">
                                                                    <input class="custom-search m-0 @error('profession') is-invalid @enderror" 
                                                                        type="text" 
                                                                        wire:model.defer="profession"
                                                                        name="profession" 
                                                                        placeholder="Profession">
                                                                    @error ('profession')
                                                                        <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label>Address:</label>
                                                                <div class="form-group mb-4">
                                                                    <input class="custom-search m-0 @error('address') is-invalid @enderror" 
                                                                        type="text" 
                                                                        wire:model.defer="address"
                                                                        name="address" 
                                                                        placeholder="Address">
                                                                    @error ('address')
                                                                        <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label>About:</label>
                                                                <div class="form-group mb-4">
                                                                    <textarea class="custom-search border-1 br-6 m-0 @error('about') is-invalid @enderror" 
                                                                        rows="4" 
                                                                        wire:model.defer="about"
                                                                        name="about" 
                                                                        placeholder="Write something...">
                                                                    </textarea>
                                                                    @error ('about')
                                                                        <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="btn-wrapper mt-0">
                                                            <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- change password -->
                                        <div class="tab-pane fade @if($currentTab == 'change_password') active show @endif" id="change_password">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="account-login-inner">
                                                    <form wire:submit.prevent="updatePassword" class="ltn__form-box contact-form-box">
                                                        <h5 class="mb-30">Change Password</h5>

                                                        <div class="form-group mb-4">
                                                            <input class="custom-search m-0 @error('password') is-invalid @enderror" 
                                                                type="password" 
                                                                wire:model.defer="password"
                                                                name="password" 
                                                                placeholder="Password*">
                                                            @error ('password')
                                                                <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <input class="custom-search m-0 @error('password_confirmation') is-invalid @enderror" 
                                                                type="password" 
                                                                wire:model.defer="password_confirmation"
                                                                name="password_confirmation" 
                                                                placeholder="Confirm Password*">
                                                            @error ('password_confirmation')
                                                                <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="btn-wrapper mt-0">
                                                            <button class="theme-btn-1 btn btn-block" type="submit">Save Changes</button>
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
                    <!-- PRODUCT TAB AREA END -->
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->
</div>
