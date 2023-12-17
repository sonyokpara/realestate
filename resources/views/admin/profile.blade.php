@extends('includes.main')

@section('title', 'Admin Profile')

@section('content')

  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="mb-2">
            <div class="text-center">
                <div class="mb-3">
                    <img class="rounded-circle" src="{{(!$profile->photo)? url('assets/images/no-image.png') : url('assets/profile-photos/'.$profile->photo)}}" alt="" width="100" height="100">
                </div>													
                <div class="ms-2">
                    <h4 class="ml-3">{{$profile->name}}</h4>
                </div>
            </div>
          </div>
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
  
                    <h6 class="card-title">Update Your Profile</h6>
                    <form class="forms-sample" method="POST" action="{{route('admin.update-profile')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$profile->name}}" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" value="{{$profile->username}}" class="form-control" id="username" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" value="{{$profile->email}}" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{$profile->phone}}" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" value="{{$profile->address}}" class="form-control" id="address">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="formFile">Upload Profile Photo</label>
                            <input class="form-control" name="photo" type="file" id="imageFile">
                        </div>

                        <div class="mb-3">
                            <img class="rounded-circle" src="{{(!$profile->photo)? url('assets/images/no-image.png') : url('assets/profile-photos/'.$profile->photo)}}" id="showImage" alt="" width="80" height="80">
                        </div>	
                        <button type="submit" class="btn btn-primary me-2">Update</button>                    </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  
  <script type="text/javascript">
      $(document).ready(function(){

          $("#imageFile").on('change', function(e){
             const reader = new FileReader();
             reader.onload = (e) => {
                $('#showImage').attr('src', e.target.result);
             }
             reader.readAsDataURL(e.target.files[0]);
          });
      });
  </script>
@endsection