@extends('layouts.master')
@section('title','Show All Notification')
@section('content')

<main id="main" class="main">
<div class="pagetitle">
  <h1>All Notification</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('showall')}}">Notification</a></li>
      <li class="breadcrumb-item active">All Notifications</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<style>
      table { width: 30% }
  tbody tr:hover.selected td,
  tbody tr:hover td {
    background-color: #FFEFC6;
    cursor: pointer;
  }
  tbody tr.selected td {
    background-color: #ffd659;
  }

</style>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Notifications</h5>

            <!-- Table with stripped rows -->
            @if( isset($userInfo['role']) && !empty($userInfo['role'] == "police_station_admin"))
            <table class="table table-striped" onclick="myFunction()"  id="tableId" class='t' style="padding: 5px;" href="{{url('extend_showall')}}">
           
            @endif

            @if(isset($userInfo['role']) && !empty($userInfo['role'] == "super_admin"))
            <table class="table table-striped" onclick="myFunction()"  id="tableId" class='t' style="padding: 5px;" href="{{url('extend_showall')}}">
            
            @endif
                <thead>
                    <tr>
                    <th></th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Date</th> 
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="divbutton">
                        <td><input class="form-check-input" type="checkbox" id="check1" name="option1" value="something"
                        style=" width: 30px;height: 20px;">
                        </td>
                        <td> Criminal</td>
                        <td>Test</td>
                        <td>12/10/2022</td>
                        <td> 
                          <div>
                            <button type="button" class="btn btn-danger" style="display: none;"><i class="bi bi-trash-fill"></i>
                            <button type="button" class="btn btn-warning" style="display: none;"><i class="bi bi-book-fill"></i>
                          </div>
                        </td>
                    </tr>
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

 <script src="{{asset('assets/js/Showall/Showall.js')}}"></script>


@endsection

