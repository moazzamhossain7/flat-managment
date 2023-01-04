<div>
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left custom-breadcrumb bg-overlay-white-30 bg-image" data-bs-bg="{{ asset('/assets/frontend/img/components/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Create Account</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a>
                                </li>
                                <li>Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- Register AREA START -->
    <div class="ltn__login-area pb-110 mt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Register <br>Your Account</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                             Sit aliquid,  Non distinctio vel iste.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">
                        <form wire:submit.prevent="save" class="ltn__form-box contact-form-box">
                            <div class="form-group mb-4">
                                <input class="custom-search m-0 @error('form.first_name') is-invalid @enderror" 
                                    type="text" 
                                    wire:model.defer="form.first_name"
                                    name="first_name" 
                                    placeholder="First Name*">
                                @error ('form.first_name')
                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <input class="custom-search m-0 @error('form.last_name') is-invalid @enderror" 
                                    type="text" 
                                    wire:model.defer="form.last_name"
                                    name="last_name" 
                                    placeholder="Last Name*">
                                @error ('form.last_name')
                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <input class="custom-search m-0 @error('form.email') is-invalid @enderror" 
                                    type="email" 
                                    wire:model.defer="form.email"
                                    name="email" 
                                    placeholder="Email*">
                                @error ('form.email')
                                    <div class="my-1 text-danger text-sm">{{ $message }}</div>
                                @enderror
                            </div>

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

                            <div class="btn-wrapper">
                                <button class="theme-btn-1 btn reverse-color btn-block" type="submit">CREATE ACCOUNT</button>
                            </div>
                        </form>

                        <div class="by-agree text-center">
                            <p class="m-0">By creating an account, you agree to our:</p>
                            <p><a href="{{ url('/terms-condition') }}">TERMS OF CONDITIONS  &nbsp; &nbsp; | &nbsp; &nbsp;  PRIVACY POLICY</a></p>

                            <div class="go-to-btn mt-50">
                                <a href="{{ url('/login') }}">ALREADY HAVE AN ACCOUNT ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register AREA END -->
</div>
