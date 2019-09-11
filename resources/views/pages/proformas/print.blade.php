<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>@yield('title')</title>
    <!-- Favicon-->



    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="{{ asset('assetss/plugins/animate-css/animate.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assetss/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assetss/plugins/morrisjs/morris.css') }}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assetss/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/color_skins.css') }}">

    <link rel="stylesheet" href="{{ asset('css/productPage.css') }}">



</head>
<body onload="print()" class="theme-green">


<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="body card">

        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <td colspan ="7">
                    <strong>Proforma Invoice</strong>
                </td>
            </tr>
            </thead>

            <tbody>

            <tr>
                <td >Seller  : </td>
                <td colspan="4">{{$proforma->seller_name}}</td>
                <td>Invoice No :  </td>
                <td>{{$proforma->invoice_no}}</td>
            </tr>

            <tr>
                <td >Buyer  : </td>
                <td colspan="4">{{$proforma->buyer_name}} </td>
                <td>Date :   </td>
                <td>{{$proforma->invoice_date}}</td>
            </tr>

            <tr>
                <td >Method of Dispapatch </td>
                <td colspan="4">{{$proforma->method_of_dispatch}}</td>
                <td>Delivery Date :   </td>
                <td>{{$proforma->delivery_date}}</td>
            </tr>

            <tr>
                <td >Type Of Shipment </td>
                <td colspan="4">{{$proforma->method_of_shipping}}</td>
                <td>Port Of Loading</td>
                <td>{{$proforma->port_of_loading}}</td>
            </tr>

            <tr>
                <td >Port Of Discharge </td>
                <td colspan="6">{{$proforma->port_of_discharge}}</td>
            </tr>

            <tr class="text-center font-bold">
                <td>Product Code</td>
                <td colspan="3">Descripetion</td>
                <td>Unit QTY</td>
                <td>Price</td>
                <td>Ammpunt</td>
            </tr>

            @php
                $total = 0;
            @endphp
            @foreach($productItems as $productItem)
                <tr class="text-center">
                    <td>{{$productItem->code_sku}}</td>
                    <td colspan="3">{{$productItem->description}}</td>
                    <td>{{$productItem->unit}}</td>
                    <td>{{$productItem->price}}</td>
                    <td>{{$productItem->price * $productItem->unit }}</td>
                    @php
                        $total += $productItem->price * $productItem->unit ;
                    @endphp
                </tr>
            @endforeach

            <tr class="text-center font-bold">
                <td colspan="6">Total</td>
                <td>
                    @php
                        echo "$total"
                    @endphp
                </td>
            </tr>


            </tbody>




        </table>

    </div>


</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->


<script src="{{ asset('assetss/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('assetss/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->

<script src="{{ asset('assetss/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('assetss/bundles/morrisscripts.bundle.js') }}a"></script><!-- Morris Plugin Js -->
<script src="{{ asset('assetss/bundles/sparkline.bundle.js') }}"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('assetss/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob Plugin Js -->

<script src="{{ asset('assetss/js/pages/index.js') }}"></script>
<script src="{{ asset('assetss/js/pages/charts/jquery-knob.min.js') }}"></script>



<script src="{{ asset('assetss/plugins/jquery-validation/jquery.validate.js') }}"></script> <!-- Jquery Validation Plugin Css -->
<script src="{{ asset('assetss/plugins/jquery-steps/jquery.steps.js') }}"></script> <!-- JQuery Steps Plugin Js -->

<script src="{{ asset('assetss/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
<script src="{{ asset('assetss/js/pages/forms/form-wizard.js') }}"></script>


<script src="{{ asset('js/productPage.js') }}"></script>
</body>
</html>
