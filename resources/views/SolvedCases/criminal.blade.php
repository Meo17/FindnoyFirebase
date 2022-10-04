@extends('layouts.master')
@section('title','Wanted Criminal List')
@section('content')


<main id="main" class="main">
  <div class="pagetitle">
    <h1>Wanted Criminals</h1>
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
                      <th scope="col">Full Name</th>
                      <th scope="col">Tag</th>
                      <th scope="col">Bounty</th>
                      <th scope="col">Date Posted</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $count= 0;?>
                    @if(!empty($criminal))
                      @foreach($criminal as $key => $val)  
                        <?php $count++;?>
                          <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$val['fname_wanted_criminals']." " .$val['m_wanted_criminals']." " .$val['lname_wanted_criminals'] }}</td>
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
                                   <a type="button" class="btn" style="color: #1e2f5c" data-wanted-id="{{$key}}"  id="btn_viewall" data-bs-toggle="modal" href="#viewwantedcriminal" >
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
  $('#criminal').addClass("active");
	$('#solved-nav').addClass("show");
  
  $('#viewwantedcriminal').modal({
      backdrop: 'static',
      keyboard: false  // to prevent closing with Esc button (if you want this too)
  });

  $('#viewwantedcriminal').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var Id = $(e.relatedTarget).data('wanted-id');
    $(e.currentTarget).find('input[id="id_wanted"]').val(Id);

     var wantedId = $('#id_wanted').val();
    $('.spinner_wanted').removeAttr('hidden');
    $(".detail_w").attr("hidden",true);
    $.ajax({
      type : 'GET',
      url :'/view_detail',
      data :  { id : wantedId },
      dataType:'json'
     }).done(function( data ) {
        $(".spinner_wanted").attr("hidden",true);
        $('.detail_w').removeAttr('hidden');
        var vdetail = data.detail;
        $('.wanted_name').text(vdetail.fname_wanted_criminals +' '+ vdetail.m_wanted_criminals +  vdetail.lname_wanted_criminals);
        $('.wanted_alias').text(vdetail.nickname_wanted_criminals);
        $('.wanted_bounty').text(vdetail.bounty_wanted_criminals);
        document.getElementById('image_wanted').src= vdetail.file_image_wanted_criminals;
    });
  });

});
</script>

@endsection
