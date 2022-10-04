@extends('layouts.master')
@section('title','Carnapped Vehicle List')
@section('content')

<main id="main" class="main">
<div class="pagetitle">
  <h1>Carnapped</h1>
  <nav>
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{url('dashboardcase')}}">Case</a></li>
      <li class="breadcrumb-item"><a href="{{url('list_carnapped')}}">Carnapped</a></li>
      <li class="breadcrumb-item active">List</li> 
    </ol>
  </nav>
</div><!-- End Page Title -->
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
                    @if(!empty($list_carnapped))
                      @foreach($list_carnapped as $key => $val)  
                        <?php $count++;?>
                          <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$val['owner_name_carnapped']}}</td>
                                <td>{{$val['plate_number_carnapped']}} </td>
                                <td>{{$val['date_reported_carnapped']}} </td>
                                <td>{{$val['status']}} </td> 
                                <td>
                                <div>
                                  <a type="button" class="btn" style="color: #1e2f5c;" data-edit-id="{{$key}}"  id="btn_edit" data-bs-toggle="modal" href="#edit_carnapped" >
                                    <i class="ri-edit-box-fill" style="font-size: 30px;"></i></a>

                                  <a type="button" class="btn" style="color: #1e2f5c" data-close-id="{{$key}}"  id="btn_deactive" data-bs-toggle="modal" href="#closeCaseCarnapped" >
                                    <i class="bi bi-person-x-fill" style="font-size: 30px;"></i></a>

                                  <a type="button" class="btn" style="color: #1e2f5c" data-car-id="{{$key}}"  id="btn_viewall" data-bs-toggle="modal" href="#viewcarnapped" >
                                    <i class="ri-eye-fill" style="font-size: 30px;"></i></a>
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
<!-- End #main -->
<script src="{{asset('assets/js/carnapped/carnapped.js')}}"></script>
@endsection
