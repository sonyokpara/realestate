@extends('includes.main')
@section('title', 'All Types')

@section('content')

{{-- <nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Property</a></li>
        <li class="breadcrumb-item active" aria-current="page">Types</li>
    </ol>
</nav> --}}

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <a href="{{route('add.type.form')}}" class="btn btn-inverse-info p-3 mb-5" >Add Property Type</a>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Type Name</th>
                                <th>Type photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $key => $item)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$item->prop_name}}</td>
                                <td>{{$item->prop_image}}</td>
                                <td>
                                    <button type="button" class="btn btn-success">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection