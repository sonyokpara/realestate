@extends('includes.main')
@section('title', 'Add Type')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Propery Type</h4>
    </div>
    <div class="card-body mt-3">
        <form method="POST" action="{{route('update.permission')}}" class="forms-sample">
            @csrf
            <input type="hidden" name="id" value="{{$permission->id}}">
            <div class="mb-3">
                <label for="prop_name" class="form-label">Permission Name</label>
                <input type="text" name="prop_name" class="form-control" value="{{$permission->name}}">
            </div>
            <div class="mb-3">
                <label for="group_name" class="form-label">Group Name</label>
                <select name="group_name" id="group_name" class="form-select @error('group_name') is-invalid @enderror">
                    <option value="type">Property Type</option>
                    <option value="state">State</option>
                    <option value="amenities">Amenities</option>
                    <option value="history">Property History</option>
                    <option value="message">Property Message</option>
                    <option value="testimonials">Testimonials</option>
                    <option value="agent">Manage Agent</option>
                    <option value="category">Blog Category</option>
                    <option value="comment">Blog Comment</option>
                    <option value="post">Blog Post</option>
                    <option value="settings">Site Setting</option>
                    <option value="role and permission">Role & Permission</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success px-3">Save Changes</button>
        </form>
    </div>
</div>
@endsection