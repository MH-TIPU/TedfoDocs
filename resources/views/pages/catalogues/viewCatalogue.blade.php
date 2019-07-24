@extends('layouts.master')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-md-12 col-sm-6 text-center">
                        <address>
                            <strong>Company Name: {{$catalogue->name}}</strong><br>
                            Company Address: {{$catalogue->company_address}}<br>
                            Factory Address: {{$catalogue->factory_address}}<br>
                            Phone No: {{$catalogue->phone}} &nbsp; &nbsp; Email: {{$catalogue->email}}
                        </address>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="mainTable" class="table table-striped" style="cursor: pointer;">
                                <thead>
                                    <tr><th>#</th>
                                        <th>Code</th>
                                        <th>Photo</th>
                                        <th>Description</th>
                                        <th>MOQ</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($catalogueItems as $catalogueItem)
                                    <tr>
                                        <td>{{$catalogueItem->id}}</td>

                                        <td>{{$catalogueItem->code_sku}}</td>

                                        <td>
                                            <img src="{{Storage::url($catalogueItem->photo)}}" height="50" width="50" alt="">
                                        </td>


                                        <td>{{$catalogueItem->description}}</td>
                                        <td>{{$catalogueItem->moq}}</td>
                                        <td>{{$catalogueItem->price}}</td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="hidden-print col-md-12 text-right">
                    <a href="#" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>
                </div>
            </div>

        </div>
    </div>
@endsection
