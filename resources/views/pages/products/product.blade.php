@extends('layouts.master')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2 class="text-secondary"> All Sellers</h2>
                <ul class="header-dropdown m-r--5">
                    <li> <button onclick="window.location='{{ route("product.create") }}'" class="btn-sm btn-raised bg-lime waves-effect"> <i class="zmdi zmdi-account-add"> Create</i> </button></li>
                </ul>
            </div>

            <div class="body table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th data-breakpoints="xs">code/SKU</th>
                        <th data-breakpoints="xs">HS Code</th>
                        <th data-breakpoints="xs">Photo</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>

                                <input type="checkbox" id="md_checkbox_10" class="chk-col-green" checked />
                                <label for="md_checkbox_10">GREEN</label>

                                {{$product->name}}</td>
                            <td>{{$product->code_sku}}</td>
                            <td>{{$product->hs_code}}</td>
                            <td>
                                <img src="{{Storage::url($product->photo)}}" height="50" width="50" alt="">
                            </td>

                            <td>
                                <a href="{{ route('product.edit', $product->id) }}"><button type="button" class="btn-sm  btn-raised btn-success waves-effect">Edit</button></a>
                            </td>
                            <td>
                                <form action="{{ route('product.destroy', $product)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm  btn-raised btn-danger waves-effect">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection