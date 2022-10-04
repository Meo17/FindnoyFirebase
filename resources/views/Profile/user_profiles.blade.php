@extends('layouts.master')
@section('title','Admin Profile')
@section('content')

<main id="main" class="main">
<div class="pagetitle">
  <h1>User Profile</h1>
 <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('dashboard_police_station')}}">Admin User</a></li>
     <!-- <li class="breadcrumb-item active">Dashboard</li> -->
    </ol>
  </nav>
      @if(!empty($error_message) && isset($error_message))
        <div class="alert alert-success alert-dismissible fade show "  role="alert" id="error_message"> 
            {{$error_message}}
          <button type="button" class="btn-close" id="close_err" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
</div>
<!-- End Page Title -->
  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admin Profile</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{url('save_user_profile')}}"  enctype="multipart/form-data">
              
              @foreach($userInfo2 as $key => $users_profile)  
                <!-- UId in police station -->
                <input type="hidden" name="keyId" value="{{$key}}">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Police Rank: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" 
                    value="{{!empty($users_profile['police_user_rank']) ? $users_profile['police_user_rank'] : '' }}" 
                    name="police_user_rank" style="text-transform: uppercase;" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Firstname: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" 
                    value="{{!empty($users_profile['police_user_fname']) ? $users_profile['police_user_fname'] : '' }}" 
                    name="police_user_fname" style="text-transform: uppercase;" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Middle Name: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" 
                      value="{{!empty($users_profile['police_user_mname']) ? $users_profile['police_user_mname'] : '' }}" 
                    name="police_user_mname" style="text-transform: uppercase;">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Lastname: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" 
                    value="{{!empty($users_profile['police_user_lname']) ? $users_profile['police_user_lname'] : ''  }}" 
                    name="police_user_lname"  style="text-transform: uppercase;" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date Of Birth: </label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" 
                     value="{{!empty($users_profile['police_user_bdate']) ? $users_profile['police_user_bdate'] : '' }}" 
                    name="police_user_bdate" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Station: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"
                     value="{{!empty($users_profile['station_name']) ? $users_profile['station_name'] : '' }}" 
                     name="station_name" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Region: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" 
                    value="{{!empty($users_profile['id_region']) ? $users_profile['id_region'] : '' }}" 
                    name="region_user_profile" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" 
                    value="{{!empty($users_profile['email']) ? $users_profile['email'] : '' }}" 
                    name="email_user_profile" disabled>
                  </div>
                </div>
                <center>
                  <div class="row mb-3" style="display: flex;justify-content: center;align-items: center;">  
                    <div class="col-sm-3" style="margin:auto" >
                      <img src="{{!empty($users_profile['police_pic_profile']) ? $users_profile['police_pic_profile'] : asset('assets/img/user.png') }}" class="card-img-top" alt="..." id="output_user" style="  padding: 5px;  width: 300px;">
                      <input onchange="userprofle(event)" class="form-control" type="file" id="formFile" name="police_pic_profile">
                    </div>
                  </div>
                  <div class="row mb-3" style="display: flex;justify-content: center;align-items: center;"> 
                  <div class="col-sm-3" style="margin:auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href ="{{ url('dashboard_police_station') }}">Cancel</a>
                  </div>
                </div>
                </center>
               @endforeach
            </form>
      </div>
  </section>

</main>
<script src="{{asset('assets/js/users_profile/users_profile.js')}}"></script>
<script>

    //preview
    var userprofle = function(event) {
      var output = document.getElementById('output_user');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };

</script>
@endsection

