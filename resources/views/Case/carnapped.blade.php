@extends('layouts.master')
@section('title','Carnapped')
@section('content')
<main id="main" class="main">
<div class="pagetitle">
  <h1>Carnapped Vehicle</h1>
 <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('carnapped')}}">Carnapped Vehicle</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
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
              <h5 class="card-title">Image Vehicle </h5>

              <!-- General Form Elements -->
              <form method="post" action="{{url('save_carnapped')}}"  enctype="multipart/form-data">
              <div class="row mb-3">   
                <div class="col-sm-12" >
                  <ol  style="display: flex;justify-content: center;align-items: center;">
                    <div class="col-sm-3" style="margin:auto">
                        <img src="assets/img/car.png" class="card-img-top" alt="..." id="output10" style="  padding: 5px;  width: 250;">
                       <input onchange="output10(event)" class="form-control" type="file" id="formFile" name="file_image_carnapped" required>
                    </div>
                    <div class="col-sm-3" style="margin:auto">
                      <img src="assets/img/car.png" class="card-img-top" alt="..." id="output11" style="  padding: 5px;  width: 250;">
                      <input onchange="output11(event)" class="form-control" type="file" id="formFile1" name="file1_image_carnapped" required>
                    </div>
                    <div class="col-sm-3" style="margin:auto" >
                      <img src="assets/img/car.png" class="card-img-top" alt="..." id="output12" style="  padding: 5px;  width: 250;">
                     <input onchange="output12(event)" class="form-control" type="file" id="formFile2" name="file2_image_carnapped" required>
                    </div>
                  </lo>  
                </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Owner Name: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="owner_name_carnapped" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Color: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="color_carnapped" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Case Number: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="case_number_carnapped" required>
                  </div>
                </div>
            
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Plate Number: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="plate_number_carnapped" required>
                  </div>
                </div>

                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Vehicle Type:</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="select_vehicle"   name="select_vehicle_carnapped">
                      <option selected>-</option>
                      <option value="Hatchback">Hatchback</option>
                      <option value="Sedan">Sedan</option>
                      <option value="SUV">SUV</option>
                      <option value="MUV">MUV</option>
                      <option value="Crossover">Crossover</option>
                      <option value="Jeep">Jeep </option>
                      <option value="Van">Van</option>
                      <option value="Multicab">Multicab</option>
                      <option value="Toyota Innova">Toyota Innova</option>
                      <option value="Toyota Wigo">Toyota Wigo</option>
                      <option value="Toyota Raize">Toyota Raize</option>
                      <option value="Toyota Vios">Toyota Vios</option>
                      <option value="Mazda"> Mazda</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>
                </div>

                <div  id="other_carnapped" class="row mb-3" hidden >
                  <label for="inputText" class="col-sm-2 col-form-label">Others : </label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control"  name="other_carnapped" >
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Police Officer:</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example"  name="police_officer_carnapped">
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
                  <label for="inputText" class="col-sm-2 col-form-label">Date Lost: </label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="date_lost_carnapped" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date Reported: </label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control"  name="date_reported_carnapped" required>
                  </div>
                </div>
                <h5 class="card-title">Upload OR/CR:</h5>         
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Attached File</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file"   name="attached_file1_carnapped" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Attached File</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file"  name="attached_file2_carnapped" required>
                  </div>
                </div>
                <h5 class="card-title">Case Papers:</h5>         
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file"  name="attached_file3_carnapped" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="attached_file4_carnapped" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file"  name="attached_file5_carnapped" >
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
        $('#carnapped').addClass("active");
       	$('#case-nav').addClass("show");

         $('#select_vehicle').on('change', function() {
          var select  = this.value;
          //Others
          if (select == 'Others') {
            $('#other_carnapped').removeAttr('hidden');
          } else {
            $('#other_carnapped').attr('hidden', 'hidden');
          }
        });

         
    });

    //preview
    var output10 = function(event) {
      var output = document.getElementById('output10');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
    //preview1
    var output11 = function(event) {
      var output = document.getElementById('output11');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
    //preview2
      var output12 = function(event) {
      var output = document.getElementById('output12');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      }
    };
</script>
@endsection

