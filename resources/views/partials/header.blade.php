<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

<head>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Vendors Min CSS -->
<link rel="stylesheet" href=" {{ asset('assets/css/vendors.min.css') }} ">
<!-- Style CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }} ">

    <title>{{ config('app.name', 'Laravel') }}</title>

<link rel="icon" type="image/png" href=" {{asset('assets/img/favicon.png')}} ">
    </head>

    {{-- @yield('content') --}}