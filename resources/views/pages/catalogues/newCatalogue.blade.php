@extends('layouts.master')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2 class="text-secondary"> New Catalogue</h2>

                <ul class="header-dropdown m-r--5">
                    {{--<li> <button onclick="window.location='{{ route("product.create") }}'" class="btn-sm btn-raised bg-lime waves-effect"> <i class="zmdi zmdi-account-add"> Add New</i> </button></li>--}}
                </ul>

            </div>

            <form action="{{route('catalogue.store')}}" method="POST">
                {{csrf_field()}}

                <div class="row clearfix body">

                <div class="col-sm-4">
                    <div class="form-group form-float form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="name"  placeholder="Company Name" required/>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group form-float form-group">
                        <div class="form-line">
                            <input type="email" class="form-control" name="email"  placeholder="Email" required/>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group form-float form-group">
                        <div class="form-line">
                            <input type="string" class="form-control" name="phone"  placeholder="Phone" required/>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="factory_address"  placeholder="Factory Address" required/>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="company_address"  placeholder="Company Address" required/>
                        </div>
                    </div>
                </div>

                </div>

                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td></td>
                            <th data-breakpoints="xs">Photo</th>
                            <th>Name</th>
                            <th data-breakpoints="xs">code/SKU</th>
                            <th data-breakpoints="xs">HS Code</th>
                            <th data-breakpoints="xs">MOQ</th>
                            <th data-breakpoints="xs">Price</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <input type="checkbox"  id="{{$product->id}}" value="{{$product->id}}"  class="chk-col-green" name="ids[]"/>
                                    <label for="{{$product->id}}"></label>
                                </td>

                                <td>
                                    <img src="{{Storage::url($product->photo)}}" height="50" width="50" alt="">
                                </td>

                                <td>{{$product->name}}</td>
                                <td>{{$product->code_sku}}</td>
                                <td>{{$product->hs_code}}</td>

                                <td class="col-sm-1">
                                    <input type="text" class="form-control" name="moqs{{$product->id}}"  value="1"  required/>
                                </td>
                                <td class="col-sm-1">
                                    <input type="text" class="form-control" name="prices{{$product->id}}" value="{{$product->cost_of_product}}" required/>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group form-float form-group">
                                <input type="submit" class="btn  btn-raised btn-success waves-effect" value="Create">
                                <a href="{{route('catalogue.index')}}"> <button type="button"  class="btn  btn-raised btn-danger waves-effect">Cancle</button> </a>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>


    </div>

@endsection
