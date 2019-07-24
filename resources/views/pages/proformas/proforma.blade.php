@extends('layouts.master')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2 class="text-secondary"> All Proformas</h2>
                <ul class="header-dropdown m-r--5">
                    <li> <button onclick="window.location='{{ route("proforma.create") }}'" class="btn-sm btn-raised bg-lime waves-effect"> <i class="zmdi zmdi-account-add"> Add New</i> </button></li>
                </ul>

            </div>

            <div class="body table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Seller Name</th>
                        <th data-breakpoints="xs">Buyer Name</th>
                        <th data-breakpoints="xs">id</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($Proformas as $Proforma)
                        <tr>
                            <td>{{$Proforma->buyer_name}}</td>
                            <td>{{$Proforma->Seller_name}}</td>
                            <td>{{$Proforma->id}}</td>


                            <td>
                                <a href="{{ route('proforma.edit', $Proforma->id) }}"><button type="button" class="btn-sm  btn-raised btn-success waves-effect">Edit</button></a>
                            </td>
                            <td>
                                <form action="{{ route('proforma.destroy', $Proforma)}}" method="post">
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
