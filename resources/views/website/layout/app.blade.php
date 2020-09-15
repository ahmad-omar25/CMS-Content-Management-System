
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog | Bookshop Responsive Bootstrap4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('website/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('website/images/icon.png')}}">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('website/style.css')}}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{asset('website/css/custom.css')}}">

    @yield('wizardCss')

    <!-- Bootstrap File input -->
    <link href="{{asset('website/bootstrap-fileinput/css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
    <!-- Modernizer js -->
    <script src="{{asset('website/js/vendor/modernizr-3.5.0.min.js')}}"></script>

</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

@include('website.includes.navbar')
    <style>
        .form-control:focus {
            box-shadow: none !important;
        }
    </style>
<!-- Start Search Popup -->
    <div class="box-search-content search_active block-bg close__top">
        <form id="search_mini_form" class="minisearch" action="#">
            <div class="field__search">
                <input type="text" placeholder="Search entire store here...">
                <div class="action">
                    <a href="#"><i class="zmdi zmdi-search"></i></a>
                </div>
            </div>
        </form>
        <div class="close__wrap">
            <span>close</span>
        </div>
    </div>
    <!-- End Search Popup -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--4"></div>
    <!-- End Bradcaump area -->
    <!-- Start Blog Area -->
@yield('content')

@include('website.includes.footer')

</div>
<!-- //Main wrapper -->

<!-- JS Files -->
<script src="{{asset('website/js/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('website/js/popper.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/plugins.js')}}"></script>
<script src="{{asset('website/js/active.js')}}"></script>

{{-- Bootstarp File Input --}}
<script src="{{asset('website/bootstrap-fileinput/js/plugins/piexif.min.js')}}" type="text/javascript"></script>
<script src="{{asset('website/bootstrap-fileinput/js/plugins/sortable.min.js')}}" type="text/javascript"></script>
<script src="{{asset('website/bootstrap-fileinput/js/plugins/purify.min.js')}}" type="text/javascript"></script>
<script src="{{asset('website/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
<script src="{{asset('website/bootstrap-fileinput/themes/fa/theme.js')}}"></script>

@yield('wizard')

@yield('script')

</body>
</html>
