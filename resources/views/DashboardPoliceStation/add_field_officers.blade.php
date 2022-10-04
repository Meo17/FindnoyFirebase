@extends('layouts.master')
@section('title','Add Field Officers')
@section('content')

<main id="main" class="main">
<div class="pagetitle">
    <!-- <h1>Police Officer Profile</h1>
    <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Police Officer</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </nav> -->
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
              <h5 class="card-title">Police Officer Profile</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{url('save_add_field_officers')}}"  enctype="multipart/form-data">
              
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Police Rank: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="rank_add_field_officers" style="text-transform: uppercase;" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Firstname: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="fname_add_field_officers" style="text-transform: uppercase;" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Middle Name: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_add_field_officers" style="text-transform: uppercase;">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Lastname: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lname_add_field_officers" style="text-transform: uppercase;" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date Hired: </label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="date_hired_add_field_officers" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email_add_field_officers" required>
                  </div>
                </div>
                <center>
                  <div class="row mb-3" style="display: flex;justify-content: center;align-items: center;">  
                    <div class="col-sm-3" style="margin:auto" >
                      <img src="assets/img/user.png" class="card-img-top" alt="..." id="output_add_officer" style="  padding: 5px;  width: 250px;">
                      <input onchange="loadFile(event)" class="form-control" type="file" id="formFile" name="file_image_add_field_officers" required>
                    </div>
                  </div>

                  <div class="row mb-3" style="display: flex;justify-content: center;align-items: center;">
                 
                  <div class="col-sm-3" style="margin:auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a type="button" class="btn btn-danger" href="{{url('list_field_officers')}}">Cancel</a>
                  </div>
                </div>
                </center>
            </form>
      </div>
  </section>

</main>

<script>
      $(document).ready(function () {
        $('#add_field_officers').addClass("active");
       	$('#forms-nav').addClass("show");

    });

    //preview
    var loadFile = function(event) {
      var output = document.getElementById('output_add_officer');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };      
</script>
@endsection

