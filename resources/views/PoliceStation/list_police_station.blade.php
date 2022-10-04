@extends('layouts.master')
@section('title','Police Station')
@section('content')
<main id="main" class="main">
<div class="pagetitle">
  <h1>List Police Station</h1>
  <nav>
    <ol class="breadcrumb" hidden>
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
    
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Region</th>
                <th scope="col">Province</th>
                <th scope="col">City</th>
                <th scope="col">Station Name</th>
                <th scope="col">Station Number</th>
                <th scope="col">Email</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $count= 0;?>
              @if(!empty($list_police_station))
                  @foreach($list_police_station as $key => $val)
                      <tr>
                          @if($val['status'] == 'active')
                             <?php $count++;?>
                            <th scope="row">{{$count}}</th>
                            <td>{{ $val['id_region']}}</td>
                            <td>{{ $val['id_province']}}</td>
                            <td>{{ $val['id_city']}}</td>
                            <td>{{ $val['station_name']}}</td>
                            <td>{{ $val['station_num']}}</td>
                            <td>{{ $val['email']}}</td>
                            <td>{{ $val['created_datetime']}}</td>
                            <td>
                              <a type="button" class="btn" style="color: #1e2f5c" data-book-id="{{$key}}"  id="btn_deactive" data-bs-toggle="modal" href="#verticalycentered-1" d>
                                <i class="ri-error-warning-fill" style="font-size: 30px;"></i></a>
                            </td>
                          @endif
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
<script src="{{asset('assets/js/super_admin/dashboard.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () { 
    $('#list_station').addClass("active");
    $('#components-nav').addClass("show");
});
</script>
@endsection
