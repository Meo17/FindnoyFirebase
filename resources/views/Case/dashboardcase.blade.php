@extends('layouts.master')
@section('title','Dashboard Case')
@section('content')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Cases</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboardcase')}}">Case</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <center style=" margin-left: 5%; margin-right: 5%; width: auto;">
      <div class="row">
        <!-- Left side columns -->
          <!-- Wanted Criminals -->
          @if(!empty($list_wanted_criminals))
              @foreach($list_wanted_criminals as $key => $val)
            @if($val['status'] == "active")

               <?php $mid =  isset($val['m_wanted_criminals']) ?$val['m_wanted_criminals'] : ''; ?>
              <!-- Card with an image on top -->
                <div class="card col-md-3" style="width: 25rem; margin: 2%; padding: 20px;" >
                  <h5 class="card-title">WANTED CRIMINAL</h5>
                    @if(!empty($val['file_image_wanted_criminals']))
                      <img src="{{ $val['file_image_wanted_criminals']}}" class="card-img-top" alt="..." style=" height: 50%; width: 100%;  object-fit: cover;">
                    @else 
                    <img src="{{asset('assets/card.jpg')}}" class="card-img-top" alt="...">
                    @endif
                  <center class="card-body d-flex flex-column align-items-center" >

                      <div class="card col-md-3" style="width: 20rem;  margin: 5%; padding: 20px;">
                        <h5> Name: {{$val['fname_wanted_criminals']." ". $mid." ".  $val['lname_wanted_criminals']  }}  </h5>
                        <h5> Allias:  {{$val['nickname_wanted_criminals']}} </h5>
                        <h5> Tag: superwanted </h5>
                        <h5> Bounty: ₱ {{$val['bounty_wanted_criminals']}}</h5>
                        <h5> Handler: {{$val['police_officer_wanted_criminals']}}</h5>
                        <h5> Station: {{ isset($userInfo['station_num'])? $userInfo['station_num'] : "" }}</h5>
                      </div>
                          <a href="{{url('list_wanted_criminal')}}" class="btn btn-outline-dark">SHOW LIST</a>
                    </center>
                  </div>

              @endif
              @endforeach
            @endif
            <!-- Missing Person -->
            @if(!empty($list_missing_person))
            @foreach($list_missing_person as $key1 => $val1)
              <?php $mid =  isset($val['m_missing_person']) ?$val['m_missing_person'] : ''; ?>
               @if($val1['status'] == "active")
                <!-- Card with an image on top -->
                <div class="card col-md-3" style="width: 25rem;  margin: 2%; padding: 20px; ">
                    <h5 class="card-title">MISSING PERSON</h5>
                    @if(!empty($val1['file_image_missing_person_url']))
                    <img src="{{$val1['file_image_missing_person_url']}}" class="card-img-top" alt="..." style="height: 50%; width: 100%;  object-fit: cover;">
                    @else 
                    <img src="{{asset('assets/card.jpg')}}" class="card-img-top" alt="..." >
                    @endif

                  <center class="card-body d-flex flex-column align-items-center">

                    <div class="card col-md-3" style="width: 25rem;  margin: 5%; padding: 20px;">
                      <h5> Name:  {{$val1['fname_missing_person']." ". $mid." ".  $val1['lname_missing_person']  }} </h5>
                      <h5> Address: {{$val1['address_missing_person']}} </h5>
                      <h5> Contact Person: {{$val1['gaurdian_missing_person']}} </h5>
                      <h5> Contact Number: {{$val1['contact_missing_person']}}</h5>
                      <h5> Handler: {{$val1['police_officer_missing_person']}}</h5>
                      <h5> Station:  {{$val1['station_name_missing_person']}} </h5>
                    </div>
                    </p>
                    <a href="{{url('list_missing_person')}}" class="btn btn-outline-dark" >SHOW LIST</a>
                  </center>
                </div>
              @endif
          @endforeach
        @endif
        <!-- Carnapped -->
        @if(!empty($list_carnapped_v))
          @foreach($list_carnapped_v as $key2 => $val2)
           @if($val1['status'] == "active")

          <!-- Card with an image on top -->
            <div class="card col-md-3" style="width: 25rem;  margin: 2%; padding: 20px;">
              <h5 class="card-title">CARNAPPED VEHICLE</h5>
                @if(!empty($val2['file_image_carnapped']))
                <img src="{{$val2['file_image_carnapped']}}" class="card-img-top" alt="..." style="height: 50%; width: 100%;  object-fit: cover;">
                @else 
                <img src="{{asset('assets/card.jpg')}}" class="card-img-top" alt="..." >
                @endif
                <center class="card-body d-flex flex-column align-items-center">
                <div class="card col-md-3" style="width: 20rem;  margin: 5%; padding: 20px;">
                  <h5> Owner:  {{$val2['owner_name_carnapped']." "  }}</h5>
                  <h5> Vehicle Type:  {{$val2['select_vehicle_carnapped']}} </h5>
                  <h5> Plate Number: {{$val2['plate_number_carnapped']}}</h5>
                  <h5> Handler: {{$val2['police_officer_carnapped']}} </h5>
                  <h5> Station: {{ isset($userInfo['station_num'])? $userInfo['station_num'] : "" }} </h5>
                </div>
                <a href="{{url('list_carnapped')}}" class="btn btn-outline-dark">SHOW LIST</a>
              </center>
            </div>
           @endif
          @endforeach
        @endif
      </div>
    </center>
  </section>
</main>  
<script>
  $(document).ready(function () 
  {
    $('#dashboardcase').addClass("active");
    $('#case-nav').addClass("show");

  });
</script>




@endsection
