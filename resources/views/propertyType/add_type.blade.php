@extends('includes.main')
@section('title', 'Add Type')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Propery Type</h4>
    </div>
    <div class="card-body mt-3">
        <form method="POST" action="" enctype="multipart/form-data" class="forms-sample">
            <div class="mb-3">
                <label for="type_name" class="form-label">Type Name</label>
                <input type="text" name="prop_name" class="form-control" id="type_name" required>
            </div>
            <div class="mb-3">
                <label for="type_name" class="form-label">Type Image</label>
                <input type="file" name="prop_" class="form-control" id="type_name" required>
            </div>
            <button type="submit" class="btn btn-success px-3">Save</button>
        </form>
    </div>
</div>
@endsection