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
<link rel="stylesheet" href="{{ asset('assets/css/image_preview.css') }} ">
<title>{{ config('app.name', 'Laravel') }}</title>
<link rel="icon" type="image/png" href=" {{asset('assets/img/favicon.png')}} ">

<!-- DataTables -->
<link href=" {{ asset('custom_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href=" {{ asset('custom_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href=" {{ asset('custom_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 

<!-- Bootstrap Css -->
{{-- <link href=" {{ asset('custom_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
<!-- Icons Css -->
{{-- <link href=" {{ asset('custom_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<!-- App Css-->
{{-- <link href=" {{ asset('custom_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> --}}

</head>

<body>