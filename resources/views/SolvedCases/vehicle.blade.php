@extends('layouts.master')
@section('title','Carnapped Vehicle Lists')
@section('content')

<main id="main" class="main">
<div class="pagetitle">
    <h1>Carnapped Vehicle</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboardcase')}}">Case</a></li>
        <li class="breadcrumb-item active">Solved Cases</li> 
      </ol>
    </nav>
  </div>
<!-- End Page Title -->
<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body" style="margin-top: 20px">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Owner Name</th>
                      <th scope="col">Plate Number</th>
                      <th scope="col">Date Filed</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $count= 0;?>
                    @if(!empty($vehicle))
                      @foreach($vehicle as $key => $val)  
                        <?php $count++;?>
                          <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$val['owner_name_carnapped']}}</td>
                                <td>{{$val['plate_number_carnapped']}} </td>
                                <td>{{$val['date_reported_carnapped']}} </td>
                                <td>{{$val['status']}} </td> 
                                <td>
                                    <a type="button" class="btn" style="color: #1e2f5c" data-car-id="{{$key}}"  id="btn_viewall" data-bs-toggle="modal" href="#viewcarnapped" >
                                    <i class="ri-eye-fill" style="font-size: 25px;"></i></a>
                                </td>
                          </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<script>
      $(document).ready(function () {
        $('#vehicle').addClass("active");
      	$('#solved-nav').addClass("show");


        $('#viewcarnapped').modal({
        backdrop: 'static',
        keyboard: false 
        // to prevent closing with Esc button (if you want this too)
        });
        
        // view
        $('#viewcarnapped').on('show.bs.modal', function(e) {
        //get data-id attribute of the clicked element
        var Id = $(e.relatedTarget).data('car-id');
        $(e.currentTarget).find('input[id="id_car"]').val(Id);

         var carId = $('#id_car').val();
        $('.spinner_car').removeAttr('hidden');
        $(".detail_car").attr("hidden",true);
        $.ajax({
          type : 'GET',
          url :'/view_detail_car',
          data :  { id : carId },
          dataType:'json'
         }).done(function( data ) {
            $(".spinner_car").attr("hidden",true);
            $('.detail_car').removeAttr('hidden');
            var pdetail = data.detail;

            if (pdetail.file_image_carnapped !=""){
              document.getElementById('output').src= pdetail.file_image_carnapped;
            }

            if ( pdetail.file1_image_carnapped !="") {
             document.getElementById('output1').src= pdetail.file1_image_carnapped;
            }
            
            if (pdetail.file2_image_carnapped !=""){
             document.getElementById('output2').src= pdetail.file2_image_carnapped;
            }

            $('#owner_name_carnapped').text(pdetail.owner_name_carnapped);
            $('#color_carnapped').text(pdetail.color_carnapped);
            $('#case_number_carnapped').text(pdetail.case_number_carnapped);
            $('#plate_number_carnapped').text(pdetail.plate_number_carnapped);
            $('#select_vehicle_carnapped').text(pdetail.select_vehicle_carnapped);
            $('#other_carnapped').text(pdetail.other_carnapped);
            $('#police_officer_carnapped').text(pdetail.police_officer_carnapped); 
            $('#date_lost_carnapped').text(pdetail.date_lost_carnapped);
            $('#date_reported_carnapped').text(pdetail.date_reported_carnapped);
            $('#attached_file1_carnapped').text(pdetail.attached_file1_carnapped);
            $('#attached_file2_carnapped').text(pdetail.attached_file2_carnapped);
            $('#attached_file3_carnapped').text(pdetail.attached_file3_carnapped);
            $('#attached_file4_carnapped').text(pdetail.attached_file4_carnapped);
            $('#attached_file5_carnapped').text(pdetail.attached_file5_carnapped);

            $('#attached_file1_carnapped').click(function() { 
               document.location = pdetail.attached_file1_carnapped;
            });

            $('#attached_file2_carnapped').click(function() { 
               document.location = pdetail.attached_file2_carnapped;
            });

            $('#attached_file3_carnapped').click(function() { 
               document.location = pdetail.attached_file3_carnapped;
            });

            $('#attached_file4_carnapped').click(function() { 
               document.location = pdetail.attached_file4_carnapped;
            });
            
            $('#attached_file5_carnapped').click(function() { 
               document.location = pdetail.attached_file5_carnapped;
            });
            
        });
      });
    });
</script>
@endsection
