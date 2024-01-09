@extends('includes.main')
@section('title', 'Permissions for role')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Set up permissions for role</h4>
    </div>
    <div class="card-body mt-3">
        <form method="POST" action="{{route('update.permission')}}" class="forms-sample">
            @csrf
            <div class="mb-3">
                <label for="prop_name" class="form-label">Role Name</label>
                <select name="group_name" id="group_name" class="form-select @error('group_name') is-invalid @enderror">
                    <option value="" selected disabled>Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="checkDefault">
                    <label class="form-check-label" for="checkDefault">
                        All Permission 
                    </label>
                </div>
            </div>
            <hr>
            @foreach ($permission_groups as $group)
                <div class="row">
                    <div class="col-3">
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="{{$group->group_name}}">
                            <label class="form-check-label" for="{{$group->group_name}}">
                                {{ucfirst($group->group_name)}} 
                            </label>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="">
                            <label class="form-check-label" for="">
                                All Permission
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-success px-3">Save Changes</button>
        </form>
    </div>
</div>
@endsection