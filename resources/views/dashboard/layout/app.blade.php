<!DOCTYPE html>
<html class="loading" lang="en" dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
        <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
        <meta name="author" content="PIXINVENT">
        <title>Dashboard</title>
        <link rel="apple-touch-icon" href="{{asset('dashboard/images/ico/apple-icon-120.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboard/images/ico/favicon.ico')}}">
        <link href="{{url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700')}}" rel="stylesheet">
        <link href="{{url('https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/weather-icons/climacons.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/fonts/meteocons/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/charts/morris.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/charts/chartist.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/charts/chartist-plugin-tooltip.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/fonts/simple-line-icons/style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/weather-icons/climacons.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/app.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/core/menu/menu-types/vertical-menu.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/core/colors/palette-gradient.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/core/colors/palette-gradient.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/pages/timeline.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/pages/dashboard-ecommerce.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/style.css')}}">
    </head>
    <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
          data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <!-- fixed-top-->
    @include('dashboard.includes.navbar')
    @include('dashboard.includes.sidebar')
    <div class="app-content content">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    @include('dashboard.includes.footer')
    @include('dashboard.includes.scripts')
    </body>
</html>
