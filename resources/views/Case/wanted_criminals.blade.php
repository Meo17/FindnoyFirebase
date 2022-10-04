@extends('layouts.master')
@section('title','Wanted Criminals')
@section('content')
 
<main id="main" class="main">
<div class="pagetitle">
  <h1>Missing Person</h1>
 <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('wanted_criminals')}}">Missing</a></li>
      <li class="breadcrumb-item active">Add</li>
    </ol>
  </nav>
      @if(!empty($error_message) && isset($error_message))
        <div class="alert alert-success alert-dismissible fade show "  role="alert" id="error_message"> 
            {{$error_message}}
          <button type="button" class="btn-close" id="close_err" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
</div>

  <section class="section"> 
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Wanted Criminals</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{url('save_wanted_criminal')}}"  enctype="multipart/form-data">
              <div class="row mb-3">  
                <div class="col-sm-4" >
                  <img src="assets/img/user.png" class="card-img-top" alt="..." id="output9" style="  padding: 5px;  width: 300px;">
                  <input onchange="output9(event)" class="form-control" type="file" id="formFile" name="file_image_wanted_criminals" required>
                </div>
                </div>  
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Firstname: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="fname_wanted_criminals" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Middle Name: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_wanted_criminals" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Surname: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lname_wanted_criminals" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Alias/Nickname: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nickname_wanted_criminals" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Case Number:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="case_number_wanted_criminals" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Case File:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="case_file_wanted_criminals" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Tag:</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example"  name="select_tags_wanted_criminals">
                        <option value="#F00">Red - Actual Threat</option>
                        <option value="#ffa500">Orange - Possible Threat </option>
                        <option value="#FFFF00">Yellow - Aware </option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Bounty:</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="bounty_wanted_criminals" placeholder="bounty is required"required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Police Officer:</label>
                  <div class="col-sm-10">
                     <select class="form-select" aria-label="Default select example"  name="police_officer_wanted_criminals">
                        @if(!empty($field_officers))
                          <option value="" disabled>-</option>
                          @foreach($field_officers as $key => $val)
                            <option value="{{$val['rank_add_field_officers'].' '.$val['fname_add_field_officers'].' '.$val['m_add_field_officers'].' ' .$val['lname_add_field_officers'] }}">{{$val['rank_add_field_officers']." ".$val['fname_add_field_officers']." " .$val['m_add_field_officers']." " .$val['lname_add_field_officers'] }}</option>
                          @endforeach
                       @endif
                      </select>

                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date Filed: </label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="date_filed_wanted_criminals" required>
                  </div>
                </div>
               

                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger">Cancel</button>
                  </div>
                </div>
              </form>
              <!-- End General Form Elements -->

            </div>
          </div>

        </div> 
      </div>
  </section>
</main>
<script>
  $(document).ready(function () {
        $('#wanted_criminals').addClass("active");
      	$('#case-nav').addClass("show");

    });
    //preview
    var output9 = function(event) {
      var output = document.getElementById('output9');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };

    let currentDiv = 1;
    let timer = setInterval(changeDiv, 2000); //set to 60000 for 60 seconds
    let maxNumOfDivs = 3;

    function changeDiv() {
      if (currentDiv < maxNumOfDivs) {

        var currentElement = document.getElementById("error_message" + currentDiv);
        $("#error_message").addClass('invisible');
        $("#close_err").click();
        currentDiv += 1;
      } else {
        clearInterval(timer);
        
      }
    }

</script>
@endsection

