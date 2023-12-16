@extends('includes.main')

@section('title', 'Admin Profile')

@section('content')
  {{-- <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="position-relative">
          <figure class="overflow-hidden mb-0 d-flex justify-content-center">
            <img src="../../../assets/images/others/profile-cover.jpg"class="rounded-top" alt="profile cover">
          </figure>
          <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
            <div>
              <img class="wd-70 rounded-circle" src="../../../assets/images/faces/face1.jpg" alt="profile">
              <span class="h4 ms-3 text-dark">Amiah Burton</span>
            </div>
            <div class="d-none d-md-block">
              <button class="btn btn-primary btn-icon-text">
                <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
              </button>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center p-3 rounded-bottom">
          <ul class="d-flex align-items-center m-0 p-0">
            <li class="d-flex align-items-center active">
              <i class="me-1 icon-md text-primary" data-feather="columns"></i>
              <a class="pt-1px d-none d-md-block text-primary" href="#">Timeline</a>
            </li>
            <li class="ms-3 ps-3 border-start d-flex align-items-center">
              <i class="me-1 icon-md" data-feather="user"></i>
              <a class="pt-1px d-none d-md-block text-body" href="#">About</a>
            </li>
            <li class="ms-3 ps-3 border-start d-flex align-items-center">
              <i class="me-1 icon-md" data-feather="users"></i>
              <a class="pt-1px d-none d-md-block text-body" href="#">Friends <span class="text-muted tx-12">3,765</span></a>
            </li>
            <li class="ms-3 ps-3 border-start d-flex align-items-center">
              <i class="me-1 icon-md" data-feather="image"></i>
              <a class="pt-1px d-none d-md-block text-body" href="#">Photos</a>
            </li>
            <li class="ms-3 ps-3 border-start d-flex align-items-center">
              <i class="me-1 icon-md" data-feather="video"></i>
              <a class="pt-1px d-none d-md-block text-body" href="#">Videos</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                    <img class="img-xs rounded-circle" src="../../../assets/images/faces/face1.jpg" alt="">													
                <div class="ms-2">
                  <h5>{{$profile->name}}</h5>
                </div>
              </div>
          </div>
          <p class="mt-3">
            Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.
          </p>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
            <p class="text-muted">{{date_format($profile->created_at, 'F j, Y')}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
            <p class="text-muted">{{$profile->address}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
            <p class="text-muted">{{$profile->email}}</p>
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
  
                    <h6 class="card-title">Edit Profile</h6>
                    <form class="forms-sample">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password">
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
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