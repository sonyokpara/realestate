@extends('includes.main')
@section('title', 'Permissions')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <a href="{{route('add.permission')}}" class="btn btn-inverse-info p-3 mb-5" >Add Permission</a>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Permission Name</th>
                                <th>Group Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->group_name}}</td>
                                <td>
                                    <a href="{{route('edit.amenity', $item->id)}}" class="btn btn-inverse-success">Edit</a>
                                    <a href="{{route('delete.type', $item->id)}}" class="btn btn-inverse-danger delete" onclick="showSwal('passing-parameter-execute-cancel')">Delete</a>
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