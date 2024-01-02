@extends('includes.main')
@section('title', 'Edit Amenity')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Amenity</h4>
    </div>
    <div class="card-body mt-3">
        <form method="POST" action="{{route('update.amenity')}}" class="forms-sample">
            @csrf
            <input type="hidden" name="id" value="{{$amenity->id}}">
            <div class="mb-3">
                <label for="prop_name" class="form-label">Amenity Name</label>
                <input type="text" name="amenity_name" class="form-control" value="{{$amenity->amenity_name}}">
            </div>
            <button type="submit" class="btn btn-success px-3">Save Changes</button>
        </form>
    </div>
</div>
@endsection