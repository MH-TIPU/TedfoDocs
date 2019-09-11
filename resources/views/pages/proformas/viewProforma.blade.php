@extends('layouts.master')

@section('content')
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
                    <td >Type Of Shipment </td>
                    <td colspan="4">{{$proforma->method_of_shipping}}</td>
                    <td>Delivery Date :   </td>
                    <td>{{$proforma->delivery_date}}</td>
                </tr>

                <tr>
                    <td >Port Of Discharge </td>
                    <td colspan="4">{{$proforma->port_of_discharge}}</td>
                    <td>Port Of Loading</td>
                    <td>{{$proforma->port_of_loading}}</td>
                </tr>

                <tr>
                    <td colspan="6" > </td>
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
                        <tr>
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

                <tr>
                    <td colspan="6" class="text-center font-bold">Total</td>
                    <td class="font-bold">
                        @php
                            echo "$total"
                        @endphp
                    </td>
                </tr>


                </tbody>




            </table>

            <hr>
            <div class="row">
                <div class=" col-md-1 text-right">
                    <a href="{{ route('proforma.print', $proforma) }}" target="_blank" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>
                </div>
            </div>

            <br>

        </div>


    </div>
@endsection
