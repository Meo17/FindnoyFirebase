@extends('layouts.master')
@section('title','List Missing Person')
@section('content')

<main id="main" class="main">
<div class="pagetitle">
  <h1>Missing Person List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('dashboardcase')}}">Case</a></li>
      <li class="breadcrumb-item"><a href="{{url('list_missing_person')}}">Missing</a></li>
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
                      <th scope="col">Full Name</th>
                      <th scope="col">Date Missing</th>
                      <th scope="col">Date Report</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $count= 0;?>
                    @if(!empty($list_missing_person))
                      @foreach($list_missing_person as $key => $val)  
                        <?php $count++;?>
                        <?php $mid =  isset($val['m_missing_person']) ?$val['m_missing_person'] : ''; ?>
                          <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$val['fname_missing_person']." ".$mid." " .$val['lname_missing_person'] }}</td>
                                <td>{{$val['date_missing_person']}} </td>
                                <td>{{$val['date_filed_missing_person']}} </td>
                                <td>{{$val['status']}} </td> 
                                <td>
                                <div>
                                  <a type="button" class="btn" style="color: #1e2f5c;" data-editmp-id="{{$key}}"  id="edit_missingp" data-bs-toggle="modal" href="#edit_missingp" >
                                    <i class="ri-edit-box-fill" style="font-size: 30px;"></i></a>

                                  <a type="button" class="btn" style="color: #1e2f5c" data-closemp-id="{{$key}}"  id="btn_deactive" data-bs-toggle="modal" href="#closeCaseMissingPerson" >
                                  <i class="bi bi-person-x-fill" style="font-size: 30px;"></i></a>

                                  <a type="button" class="btn" style="color: #1e2f5c" data-missing-id="{{$key}}"  id="viewmissingperson" data-bs-toggle="modal" href="#viewmissingperson" >
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
      <script src="{{asset('assets/js/missing_person/missing_person.js')}}"></script>
@endsection