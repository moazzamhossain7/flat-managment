<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="" />
        <meta name="keywords" content="">
        <!-- Canonical SEO -->
        <link rel="canonical" href="">

        <title>{{ config('app.name') }} - {{ $title ?? '' }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="./img/favicon/favicon.ico" />

        <!-- Include Styles --> 
        @include('layouts/sections/styles')

        <!-- Include Scripts for customizer, helper, analytics, config --> 
        @include('layouts/sections/scriptsIncludes')

        <style>
            .pointer {
                cursor: pointer;
            }
        </style>

        <livewire:styles />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    </head>
    <body>
        @php
            /* Display elements */
            $contentNavbar = true;
            $containerNav = ($containerNav ?? 'container-xxl');
            $isNavbar = ($isNavbar ?? true);
            $isMenu = ($isMenu ?? true);
            $isFlex = ($isFlex ?? false);
            $isFooter = ($isFooter ?? true);
            $customizerHidden = ($customizerHidden ?? '');
            $pricingModal = ($pricingModal ?? false);

            /* HTML Classes */
            $navbarDetached = 'navbar-detached';

            /* Content classes */
            $container = ($container ?? 'container-xxl');
        @endphp

        <div class="layout-wrapper layout-content-navbar {{ $isMenu ? '' : 'layout-without-menu' }}">
            <div class="layout-container"> 
                <x-toast message="{{ session('flash_message') }}" type="{{ session('flash_message_level') }}" />

                @if ($isMenu) 
                    @include('layouts/sections/menu/verticalMenu') 
                @endif
                <!-- Layout page -->
                <div class="layout-page">
                    <!-- BEGIN: Navbar--> 
                    @if ($isNavbar) 
                        @include('layouts/sections/navbar/navbar') 
                    @endif
                    <!-- END: Navbar-->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content --> 
                        <div class="{{$container}} {{ $isFlex ? 'd-flex align-items-stretch flex-grow-1 p-0' : 'flex-grow-1 container-p-y' }}"> 

                            {{ $slot }}
                            
                            <!-- pricingModal -->
                            @if ($pricingModal) 
                                @include('_partials/_modals/modal-pricing') 
                            @endif
                            <!--/ pricingModal -->
                        </div>
                        <!-- / Content -->

                        <!-- Footer --> 
                        @if ($isFooter) 
                            @include('layouts/sections/footer/footer') 
                        @endif
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!--/ Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div> 

            @if ($isMenu)
                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div> 
            @endif

            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>
        <!-- / Layout wrapper -->
        
        <!-- Include Scripts --> 
        @include('layouts/sections/scripts')
        
        <!-- Alpine v3 -->
        <script defer src="//unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
        {{-- <script src="//unpkg.com/trix@1.2.3/dist/trix.js"></script>
        <script src="//cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="//unpkg.com/filepond/dist/filepond.js"></script> --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="//cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js" integrity="sha256-Huqxy3eUcaCwqqk92RwusapTfWlvAasF6p2rxV6FJaE=" crossorigin="anonymous"></script>

        <livewire:scripts />
        
        <script>
            window.addEventListener('closeModal', (e) => {
                $("#" + e.detail).modal('hide');
            });

            document.addEventListener('livewire:load', () => {
                Livewire.on('swalConfirm', (params, evt = 'triggerDelete', btnTxt = 'Yes, delete it!', msg = 'You won\'t be able to revert this!') => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: msg,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: btnTxt,
                        customClass: {
                            confirmButton: 'btn btn-danger me-1',
                            cancelButton: 'btn btn-label-secondary'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if(typeof params === 'string' || typeof params === 'number') {
                                livewire.emit(evt, params);
                                return;
                            }

                            livewire.emit(evt, ...params);
                        }
                    })
                })
            });
        </script>
    </body>
</html>
