@extends('includes.main')
@section('title', 'Add Type')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Import Permissions</h4>
    </div>

    <div class="card-body mt-2">
        <a href="{{route('export.permission')}}" class="btn btn-inverse-warning p-3 mb-3" >Download Permissions</a>
        <form method="POST" action="{{route('import.permission')}}" class="forms-sample">
            @csrf
            <div class="mb-3">
                <label for="prop_name" class="form-label">Excel File</label>
                <input type="file" name="file" class="form-control" >
            </div>
            <button type="submit" class="btn btn-inverse-success px-3">Upload</button>
        </form>
    </div>
</div>
@endsection