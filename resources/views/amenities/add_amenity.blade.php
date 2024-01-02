@extends('includes.main')
@section('title', 'Add Amenity')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Amenity</h4>
    </div>
    <div class="card-body mt-3">
        <form method="POST" action="{{route('store.amenity')}}" class="forms-sample">
            @csrf
            <div class="mb-3">
                <label for="prop_name" class="form-label">Amenity Name</label>
                <input type="text" name="amenity_name" class="form-control @error('amenity_name') is-invalid @enderror" id="amenity_name">
                @error('amenity_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success px-3">Save</button>
        </form>
    </div>
</div>
@endsection