@extends('includes.main')
@section('title', 'Change Password | Admin')

@section('content')
<div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="mb-2">
            <div class="text-center">
                <div class="mb-3">
                    <img class="rounded-circle" src="{{(!$user->photo)? url('assets/images/no-image.png') : url('assets/profile-photos/'.$user->photo)}}" alt="" width="100" height="100">
                </div>													
                <div class="ms-2">
                    <h4 class="ml-3">{{$user->name}}</h4>
                </div>
            </div>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
            <p class="text-muted">{{date_format($user->created_at, 'F j, Y')}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
            <p class="text-muted">{{$user->address}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
            <p class="text-muted">{{$user->email}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
            <p class="text-muted"></p>
          </div>
        </div>
      </div>
    </div>
    <!-- left wrapper end -->

    <!-- middle wrapper start -->
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card">
                <div class="card-body">
  
                    <h6 class="card-title">Change Password</h6>
                    <form class="forms-sample" method="POST" action="{{route('admin.chg-password')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control @error('old_password')
                                is-invalid
                            @enderror" id="old_password" autocomplete="off">
                            @error('old_password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" name="new_password"  class="form-control @error('new_password')
                                is-invalid
                            @enderror" id="new_password" autocomplete="off">
                            @error('new_password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                        </div>
                        
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->
  </div>
@endsection