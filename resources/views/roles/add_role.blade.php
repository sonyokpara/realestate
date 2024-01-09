@extends('includes.main')
@section('title', 'Add Role')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Role</h4>
    </div>
    <div class="card-body mt-3">
        <form method="POST" action="{{route('store.role')}}" class="forms-sample">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success px-3">Save</button>
        </form>
    </div>
</div>
@endsection