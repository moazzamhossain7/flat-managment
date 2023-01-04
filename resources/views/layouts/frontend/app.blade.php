<!DOCTYPE html>
<html class="no-js" 
    lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    data-assets-path="{{ asset('/assets') . '/' }}" 
    data-base-url="{{url('/')}}" 
    data-framework="laravel">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="Ar Properties limited" />
        <meta name="keywords" content="property, home, rent">

        <title>{{ config('app.name') }} - {{ $title ?? '' }}</title>

        <link rel="shortcut icon" href="{{ asset('/assets/frontend/img/favicon.png') }}" type="image/x-icon" />
        <link rel="stylesheet" href="{{ asset('/assets/frontend/css/font-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/frontend/css/plugins.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/frontend/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/frontend/css/responsive.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/frontend/css/custom.css') }}" />

        <livewire:styles />
    </head>

    <body>
        <div class="wrapper">
            @include('layouts.frontend.header')
            <div class="ltn__utilize-overlay"></div>
            <x-toast message="{{ session('flash_message') }}" type="{{ session('flash_message_level') }}" />

            {{ $slot }}

            @include('layouts.frontend.footer')
            {{-- @include('layouts.frontend.modal') --}}
        </div>

        <!-- preloader area start -->
        <div class="preloader d-none" id="preloader">
            <div class="preloader-inner">
                <div class="spinner">
                    <div class="dot1"></div>
                    <div class="dot2"></div>
                </div>
            </div>
        </div>
        <!-- preloader area end -->

        <!-- Main JS -->
        <script src="{{ asset('/assets/frontend/js/plugins.js') }}"></script>
        <script src="{{ asset('/assets/frontend/js/main.js') }}"></script>
        <script src="{{ asset('/assets/frontend/js/custom.js') }}"></script>
        <script defer src="//unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
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

            $(document).ready(function() {
                $(".alert").delay(4500).fadeOut('slow');
            });
        </script>
    </body>
</html>
