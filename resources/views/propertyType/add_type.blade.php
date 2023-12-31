@extends('includes.main')
@section('title', 'Add Type')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Propery Type</h4>
    </div>
    <div class="card-body mt-3">
        <form method="POST" action="{{route('store.type')}}" enctype="multipart/form-data" class="forms-sample">
            @csrf
            <div class="mb-3">
                <label for="prop_name" class="form-label">Type Name</label>
                <input type="text" name="prop_name" class="form-control @error('prop_name') is-invalid @enderror" id="prop_name">
                @error('prop_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="prop_image" class="form-label">Type Image</label>
                <input type="text" name="prop_image" class="form-control @error('prop_image') is-invalid @enderror" id="prop_image">
                @error('prop_image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success px-3">Save</button>
        </form>
    </div>
</div>
@endsection