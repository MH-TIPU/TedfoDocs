<!doctype html>
<html class="no-js ">
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.ico" type="image/x-icon')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}"/>
    <link rel="stylesheet" href="{{asset('plugins/morrisjs/morris.css')}}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/color_skins.css')}}">

    {{--Custom Product css--}}
    <link rel="stylesheet" href="{{asset('css/productPage.css')}}">





</head>

<body class="theme-green">
<!-- Page Loader -->

<div class="page-loader-wrapper">
    <div class="loader">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <p>Please wait...</p>
        <div class="m-t-30"><img src="{{asset('images/tedfo.png')}}" width="48" height="48" alt="Tedfo Docs"></div>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
    <div class="search-icon"> <i class="material-icons">search</i> </div>
    <input type="text" placeholder="Enter here...">
    <div class="close-search"> <i class="material-icons">close</i> </div>
</div>

<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">

        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="{{asset('images/tedfo.png')}}" width="20" height="20"> </a>
            <a class="navbar-brand" href="#">Tedfo Docs</a>

        </div>

        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn " data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
            <li><a href="#" class="inbox-btn hidden-sm-down" data-close="true"><i class="zmdi zmdi-email"></i></a></li>


        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('logout') }}" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
        </ul>
    </div>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('images/xs/avatar1.jpg')}}" width="48" height="48" alt="User" />
        </div>

        <div class="info-container">
            <div class="name">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>
        </div>

    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li> <a href="/"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

            <li class="open active"> <a href="#" class="menu-toggle"><i class="zmdi zmdi-accounts"></i><span>Profiles</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('buyer.index')}}">Buyer</a> </li>
                    <li><a href="{{route('seller.index')}}">Seller</a> </li>
                    <li><a href="{{route('shipper.index')}}">Shipper</a> </li>
                </ul>
            </li>


            <li><a href="#" class="menu-toggle"><i class="zmdi zmdi-money-box"></i><span>Banks</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('buyerBank.index')}}">Buyer Bank</a> </li>
                    <li><a href="{{route('sellerBank.index')}}">Seller Bank</a> </li>
                </ul>
            </li>


            <li> <a href="{{route('cnf.index')}}"><i class="zmdi zmdi-boat"></i><span>CNF</span> </a> </li>
            <li><a href="{{route('product.index')}}"><i class="zmdi zmdi-codepen"></i><span>Product</span> </a></li>

            <li><a href="#" class="menu-toggle"><i class="fas fa-receipt"></i><span>Documents</span></a>
                <ul class="ml-menu">

                    <a href="#" class="menu-toggle"><i class="far fa-file-alt"></i><span>Sales Documents</span></a>
                    <ul class="ml-menu">
                        <li><a href="#">Proforma Invoice</a> </li>
                        <li><a href="#"> Quotation</a> </li>
                        <li><a href="#"> Purchase Order</a> </li>
                        <li><a href="#"> Order Confirmation</a> </li>
                    </ul>

                    <a href="#" class="menu-toggle"><i class="far fa-file-alt"></i><span>Shipping Documents</span></a>
                    <ul class="ml-menu">
                        <li><a href="#">Commercial Invoice</a> </li>
                        <li><a href="#"> Packing List</a> </li>
                        <li><a href="#"> Certificate of Origin</a> </li>
                        <li><a href="#"> Packing List for Customer</a> </li>
                        <li><a href="#"> Packing List for Buyer</a> </li>
                    </ul>

                </ul>
            </li>


            <li><a href="#"><i class="fas fa-chart-bar"></i><span>Report</span> </a></li>

        </ul>
    </div>
    <!-- #Menu -->
</aside>



<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <small class="text-muted"> Welcome to Tedfo Docs</small>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">

                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-item active" href="{{route('home')}}">
                        <i class="zmdi zmdi-home"></i>
                    </li>

                    @for($i = 1; $i <= count(Request::segments()); $i++)
                        <li>
                            <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
                                / {{strtoupper(Request::segment($i))}}
                            </a>
                        </li>
                    @endfor
                </ol>

            </div>
        </div>
    </div>
    @yield('content')
</section>

<div class="footer">

</div>

<!-- Jquery Core Js -->
<script src="{{asset('bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{asset('bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

<script src="{{asset('bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
<script src="{{asset('bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob Plugin Js -->

<script src="{{asset('bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('js/pages/index.js')}}"></script>
<script src="{{asset('js/pages/charts/jquery-knob.min.js')}}"></script>
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('js/productPage.js')}}"></script>


<script scr="{{asset('js/app.js')}}" > </script>


</body>
</html>