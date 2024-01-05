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
                    <option value="type" {{$permission->group_name == 'type'? 'selected':''}}>Property Type</option>
                    <option value="state" {{$permission->group_name == 'state'? 'selected':''}}>State</option>
                    <option value="amenities" {{$permission->group_name == 'amenities'? 'selected':''}}>Amenities</option>
                    <option value="history" {{$permission->group_name == 'history'? 'selected':''}}>Property History</option>
                    <option value="message" {{$permission->group_name == 'message'? 'selected':''}}>Property Message</option>
                    <option value="testimonials" {{$permission->group_name == 'testimonials'? 'selected':''}}>Testimonials</option>
                    <option value="agent" {{$permission->group_name == 'agent'? 'selected':''}}>Manage Agent</option>
                    <option value="category" {{$permission->group_name == 'category'? 'selected':''}}>Blog Category</option>
                    <option value="comment" {{$permission->group_name == 'comment'? 'selected':''}}>Blog Comment</option>
                    <option value="post" {{$permission->group_name == 'post'? 'selected':''}}>Blog Post</option>
                    <option value="settings" {{$permission->group_name == 'settings'? 'selected':''}}>Site Setting</option>
                    <option value="role and permission" {{$permission->group_name == 'role and permission'? 'selected':''}}>Role & Permission</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success px-3">Save Changes</button>
        </form>
    </div>
</div>
@endsection