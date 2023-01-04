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

        <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">

        <!-- Include Scripts for customizer, helper, analytics, config --> 
        @include('layouts/sections/scriptsIncludes')
    </head>
    <body>
        <!-- Content -->
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    {{ $slot }}           
                </div>
            </div>
        </div>
        <!-- / Content -->
        
        <!-- Include Scripts --> 
        @include('layouts/sections/scripts')
    </body>
</html>
