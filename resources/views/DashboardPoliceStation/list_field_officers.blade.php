@extends('layouts.master')
@section('title','List Field Officers')
@section('content')


<main id="main" class="main">
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
                      <th scope="col">Full Name</th>
                      <th scope="col">Position</th>
                      <th scope="col">Date Hired</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $count= 0;?>
                    @if(!empty($field_officers))
                      @foreach($field_officers as $key => $val)  
                        <?php $count++;?>
                          <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$val['rank_add_field_officers']." ".$val['fname_add_field_officers']." " .$val['m_add_field_officers']." " .$val['lname_add_field_officers'] }}</td>
                                <td>{{$val['rank_add_field_officers']}} </td>
                                <td>{{$val['date_hired_add_field_officers']}} </td>
                                <td>{{$val['status']}} </td> 
                                <td>
                                   <a type="button" class="btn" style="color:#bf0000 " data-book-id="{{$key}}"  id="btn_deactive" data-bs-toggle="modal" href="#verticalycentered2">
                                    <i class="ri-error-warning-fill" style="font-size: 25px;"></i>
                                   </a>
                                   <a type="button" class="btn" style="color:#bf0000 " data-book-id="{{$key}}" data-officerInfo=""  id="btn_request_deac" data-bs-toggle="modal" href="#request_deactivation_officer_modal">
                                     <i class="ri-error-warning-fill" style="font-size: 25px;"></i>
                                   </a> 
                              </td>
                          </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->
<script src="{{asset('assets/js/dashboard_police_station/dashboard_police_station.js')}}"></script>
<script>
      $(document).ready(function () {
        $('#list_field_officers').addClass("active");
      	$('#forms-nav').addClass("show");
    });
</script>
@endsection

