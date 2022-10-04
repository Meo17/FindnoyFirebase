@extends('layouts.master')
@section('title','Missing Person List')
@section('content')

<main id="main" class="main">
<div class="pagetitle">
    <h1>Missing Person Lists</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""> Solved Case</a></li>
        <li class="breadcrumb-item active">List</li> 
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
                      <th scope="col">Full Name</th>
                      <th scope="col">Date Missing</th>
                      <th scope="col">Date Report</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $count= 0;?>
                    @if(!empty($missing))
                      @foreach($missing as $key => $val)  
                        <?php $count++;?>
                          <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$val['fname_missing_person']." ".$val['m_missing_person']." " .$val['lname_missing_person'] }}</td>
                                <td>{{$val['date_missing_person']}} </td>
                                <td>{{$val['date_filed_missing_person']}} </td>
                                <td>{{$val['status']}} </td> 
                                <td>
                                <div class="alert">
                                  <a type="button" class="btn btn-success" data-book-id="{{$key}}"  id="btn_deactive" data-bs-toggle="modal" href="#verticalycentered" d>
                                    <i>Edit</i></a>
                                  <a type="button" class="btn btn-danger" data-book-id="{{$key}}"  id="btn_deactive" data-bs-toggle="modal" href="#verticalycentered" d>
                                    <i class="fa fa-trash">Delete</i></a>
                                  <a type="button" class="btn btn-primary" data-book-id="{{$key}}"  id="btn_deactive" data-bs-toggle="modal" href="#verticalycentered" d><i>View</i></a>
                                 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                 This is an alert box.
                               </div>
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
        $('#missing').addClass("active");
      	$('#solved-nav').addClass("show");

    });
</script>
@endsection
