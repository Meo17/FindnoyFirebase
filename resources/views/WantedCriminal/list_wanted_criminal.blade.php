@extends('layouts.master')
@section('title','List Wanted Criminal')
@section('content')

<main id="main" class="main">
<div class="pagetitle">
  <h1>Wanted Criminal List</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('dashboardcase')}}">Case</a></li>
      <li class="breadcrumb-item"><a href="{{url('list_wanted_criminal')}}">Wanted</a></li>
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
                      <th scope="col">Wanted Tag</th>
                      <th scope="col">Bounty</th>
                      <th scope="col">Date Posted</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $count= 0;?>
                    @if(!empty($list_wanted_criminal))
                      @foreach($list_wanted_criminal as $key => $val)  
                        <?php $mid =  isset($val['m_missing_person']) ?$val['m_missing_person'] : ''; ?>
                        <?php $count++;?>
                          <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$val['fname_wanted_criminals']." " .$mid." " .$val['lname_wanted_criminals'] }}</td>
                                <td>
                                    @if($val['select_tags_wanted_criminals'] == "#F00")
                                      Actual Threat
                                    @elseif($val['select_tags_wanted_criminals'] == "#ffa500")
                                      Possible Threat
                                    @elseif($val['select_tags_wanted_criminals'] == "#FFFF00")
                                      Aware
                                    @endif 
                                </td>
                                <td>{{ $val['bounty_wanted_criminals'] }}</td>
                                <td>{{ $val['created_datetime'] }}</td>
                                <td>{{ $val['status'] }}</td>
                                <td>
                                <div>
                                  <a type="button" class="btn" style="color: #1e2f5c;" data-edit-id="{{$key}}"  id="btn_edit" data-bs-toggle="modal" href="#edit_wanted" >
                                    <i class="ri-edit-box-fill" style="font-size: 30px;"></i></a>

                                  <a type="button" class="btn" style="color: #1e2f5c" data-close-id="{{$key}}"  id="btn_deactive" data-bs-toggle="modal" href="#closeCaseWanted" >
                                    <i class="bi bi-person-x-fill" style="font-size: 30px;"></i></a>

                                  <a type="button" class="btn" style="color: #1e2f5c" data-wanted-id="{{$key}}"  id="btn_viewall" data-bs-toggle="modal" href="#viewwantedcriminal" >
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
<script src="{{asset('assets/js/wanted_criminal/wanted_criminal.js')}}"></script>
@endsection
