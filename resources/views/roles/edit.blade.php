@extends('includes.main')
@section('title', 'Edit Role')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Role</h4>
    </div>
    <div class="card-body mt-3">
        <form method="POST" action="{{route('update.role')}}" class="forms-sample">
            @csrf
            <input type="hidden" name="id" value="{{$role->id}}">
            <div class="mb-3">
                <label for="prop_name" class="form-label">Role Name</label>
                <input type="text" name="name" class="form-control" value="{{$role->name}}">
            </div>
            <button type="submit" class="btn btn-success px-3">Save Changes</button>
        </form>
    </div>
</div>
@endsection