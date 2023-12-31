@extends('includes.main')
@section('title', 'Add Type')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Propery Type</h4>
    </div>
    <div class="card-body mt-3">
        <form method="POST" action="{{route('update.type')}}" class="forms-sample">
            @csrf
            <input type="hidden" name="id" value="{{$type->id}}">
            <div class="mb-3">
                <label for="prop_name" class="form-label">Type Name</label>
                <input type="text" name="prop_name" class="form-control" value="{{$type->prop_name}}">
            </div>
            <div class="mb-3">
                <label for="prop_image" class="form-label">Type Image</label>
                <input type="text" name="prop_image" class="form-control" value="{{$type->prop_image}}">
            </div>
            <button type="submit" class="btn btn-success px-3">Save Changes</button>
        </form>
    </div>
</div>
@endsection