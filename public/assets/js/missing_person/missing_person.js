$(document).ready(function () {

  $('#list_missing_person').addClass("active");
  $('#case-nav').addClass("show");

  $('#viewmissingperson').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var Id = $(e.relatedTarget).data('missing-id');
    console.log(Id);
    $(e.currentTarget).find('input[id="id_missing_p"]').val(Id);

    var missing_p = $('#id_missing_p').val();
    $('.spinner_mp').removeAttr('hidden');
    $(".detail_mp").attr("hidden",true);
    $.ajax({
      type : 'GET',
      url :'/view_detail_mp',
      data :  { id : missing_p },
      dataType:'json'
     }).done(function( data ) {
        $(".spinner_mp").attr("hidden",true);
        $('.detail_mp').removeAttr('hidden');
        var mdetail = data.detail;
        document.getElementById('image_missing').src= mdetail.file_image_missing_person_url;

        $('#missing_name').text(mdetail.fname_missing_person +' '+ mdetail.m_missing_person +' '+ mdetail.lname_missing_person );
        $('#nickanme_name_missing_person').text(mdetail.nickanme_name_missing_person);
        $('#address_missing_person').text(mdetail.address_missing_person);
        $('#location_missing_person').text(mdetail.location_missing_person);
        $('#date_missing_person').text(mdetail.date_missing_person);
        $('#gaurdian_missing_person').text(mdetail.gaurdian_missing_person);
        $('#contact_missing_person').text(mdetail.contact_missing_person);
        $('#region_missing_person').text(mdetail.region_missing_person);
        $('#province_missing_person').text(mdetail.province_missing_person);
        $('#city_missing_person').text(mdetail.city_missing_person);
        $('#station_name_missing_person').text(mdetail.station_name_missing_person);
        $('#station_num_missing_person').text(mdetail.station_num_missing_person);
        $('#police_officer_missing_person').text(mdetail.police_officer_missing_person);
        $('#date_filed_missing_person').text(mdetail.date_filed_missing_person);

            // $('.attached_file1_missing').text(mdetail.doc1_missing_person_url);
        $('.doc2_missing_person_url').text(mdetail.doc2_missing_person_url);
        $('.doc3_missing_person_url').text(mdetail.doc3_missing_person_url);

        if(mdetail.doc1_missing_person_url !="") {
           $('#doc1_missing_person_url').text(mdetail.doc1_missing_person_url);
         }

         $('#doc1_missing_person_url').click(function() { 
           document.location = mdetail.doc1_missing_person_url;
        });

        if(mdetail.doc1_missing_person_url !="") {
         $('#doc2_missing_person_url').text(mdetail.doc2_missing_person_url);
       }

       $('#doc2_missing_person_url').click(function() { 
         document.location = mdetail.doc2_missing_person_url;
       });


       if(mdetail.doc3_missing_person_url !="") {
         $('#doc3_missing_person_url').text(mdetail.doc3_missing_person_url);
       }

      // $('#doc3_missing_person_url').click(function() { 
      //   document.location = pdetail.doc3_missing_person_url;
      // });

      //  $('#doc1_missing_person_url').click(function() { 
      //     document.location = mdetail.doc1_missing_person_url;
      //  });

      //  $('#doc2_missing_person_url').click(function() { 
      //     document.location = mdetail.doc2_missing_person_url;
      //  });

      //  $('#doc3_missing_person_url').click(function() { 
      //     document.location = mdetail.doc3_missing_person_url;
      //  });



      //   $('.#missing_name').text(pdetail.fname_missing_person +' '+ pdetail.m_missing_person +  pdetail.lname_missing_person);
      //   $('.#nickanme_name_missing_person').text(pdetail.nickanme_name_missing_person);
      //   $('.#address_missing_person').text(pdetail.address_missing_person);
      //   $('.#location_missing_person').text(pdetail.location_missing_person);
      //   $('.#date_missing_person').text(pdetail.date_missing_person);
      //   $('.#gaurdian_missing_person').text(pdetail.gaurdian_missing_person);
      //   $('.#contact_missing_person').text(pdetail.contact_missing_person);
      //   $('.#region_missing_person').text(pdetail.region_missing_person);
      //   $('.#province_missing_person').text(pdetail.province_missing_person);
      //   $('.#city_missing_person').text(pdetail.city_missing_person);
      //   $('.#station_name_missing_person').text(pdetail.station_name_missing_person);
      //   $('.#station_num_missing_person').text(pdetail.station_num_missing_person);
      //   $('.#police_officer_missing_person').text(pdetail.police_officer_missing_person);
      //   $('.#date_filed_missing_person').text(pdetail.date_filed_missing_person);

      //   // $('.attached_file1_missing').text(pdetail.doc1_missing_person_url);
      //   $('.doc2_missing_person_url').text(pdetail.doc2_missing_person_url);
      //   $('.doc3_missing_person_url').text(pdetail.doc3_missing_person_url);

      //   if(pdetail.doc1_missing_person_url !="") {
      //     $('#doc1_missing_person_url').text(pdetail.doc1_missing_person_url);
      //   }

      //   $('#doc1_missing_person_url').click(function() { 
      //     document.location = pdetail.doc1_missing_person_url;
      //  });

      //  if(pdetail.doc1_missing_person_url !="") {
      //   $('#doc2_missing_person_url').text(pdetail.doc2_missing_person_url);
      // }

      // $('#doc2_missing_person_url').click(function() { 
      //   document.location = pdetail.doc2_missing_person_url;
      // });


      // if(pdetail.doc3_missing_person_url !="") {
      //   $('#doc3_missing_person_url').text(pdetail.doc3_missing_person_url);
      // }

      // $('#doc3_missing_person_url').click(function() { 
      //   document.location = pdetail.doc3_missing_person_url;
      // });


    });


  });

  $('#edit_missingp').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var Id = $(e.relatedTarget).data('editmp-id');
    console.log(Id);
    $(e.currentTarget).find('input[id="id_update_mp"]').val(Id);
    var missing_p = $('#id_update_mp').val();
    $('.spinner_update_mp').removeAttr('hidden');
    $(".update_missing_p").attr("hidden",true);
    $.ajax({
      type : 'GET',
      url :'/view_detail_mp',
      data :  { id : missing_p },
      dataType:'json'
     }).done(function( data ) {
        $(".spinner_update_mp").attr("hidden",true);
        $('.update_missing_p').removeAttr('hidden');
        var pdetail = data.detail;
        document.getElementById('scr_image_missing').src= pdetail.file_image_missing_person_url;

        $('input[name="fname_missing_person"]').val(pdetail.fname_missing_person);
        $('input[name="m_missing_person"]').val(pdetail.m_missing_person);
        $('input[name="lname_missing_person"]').val(pdetail.lname_missing_person);
        $('input[name="nickanme_name_missing_person"]').val(pdetail.nickanme_name_missing_person);
        $('input[name="address_missing_person"]').val(pdetail.address_missing_person);
        $('input[name="location_missing_person"]').val(pdetail.location_missing_person);
        $('input[name="date_missing_person"]').val(pdetail.date_missing_person);
        $('input[name="gaurdian_missing_person"]').val(pdetail.gaurdian_missing_person);
        $('input[name="contact_missing_person"]').val(pdetail.contact_missing_person);
        $('input[name="region_missing_person"]').val(pdetail.region_missing_person);
        $('input[name="select_province_missing_person"]').val(pdetail.select_province_missing_person);
        $('input[name="select_city_missing_person"]').val(pdetail.select_city_missing_person);
        $('input[name="select_station_name_missing_person"]').val(pdetail.select_station_name_missing_person);
        $('input[name="select_station_number_missing_person"]').val(pdetail.select_station_number_missing_person);
        $('input[name="police_officer_missing_person"]').val(pdetail.police_officer_missing_person);
        $('input[name="date_filed_missing_person"]').val(pdetail.date_filed_missing_person);
        
        $('#doc1_missing_person_url1').text(pdetail.doc1_missing_person_url);
        $('#doc2_missing_person_url2').text(pdetail.doc2_missing_person_url);
        $('#doc3_missing_person_url3').text(pdetail.doc3_missing_person_url);

        $('select[name="police_officer_missing_person"] option[value="' + pdetail.officer + '"]').attr('selected','selected');


        if(pdetail.province_missing_person == "Cebu City" ) {
          $("#select_province_missing_person").val("3");
          //cebu city
          if ($("#select_province_missing_person").val() == 3) {
              $('#select_city_missing_person').append(
              `
                <option selected>-</option>
                <option value="0">Alcantara</option>
                <option value="1">Alcoy</option>
                <option value="2">Alegria</option>
                <option value="3">Aloguinsan</option>
                <option value="4">Argao</option>
                <option value="5">Asturias</option>
                <option value="6">Badian</option>
                <option value="7">Balamban</option>
                <option value="8">Bogo City</option>
                <option value="9">Bantayan</option>
                <option value="10">Barili</option>
                <option value="11">Boljoon</option>
                <option value="12">Borbon</option>
                <option value="13">Carcar City</option>
                <option value="14">Carmen</option>
                <option value="15">Catmon</option>
                <option value="16">Cebu City</option>
                <option value="17">Compostela</option>
                <option value="18">Consolacion</option>
                <option value="19">Cordova</option>
                <option value="20">Daan Bantayan</option>
                <option value="21">Dalaguete</option>
                <option value="22">Danao</option>
                <option value="23">Dumanjug</option>
                <option value="24">Ginatilan</option>
                <option value="25">Lapu-Lapu City</option>
                <option value="26">Liloan</option>
                <option value="27">Madridejos</option>
                <option value="28">Malabuyoc</option>
                <option value="29">Mandaue City</option>
                <option value="30">Medellin</option>
                <option value="31">Minglanilla</option>
                <option value="32">Moalboal</option>
                <option value="33">Naga City</option>
                <option value="34">Oslob</option>
                <option value="35">Pilar</option>
                <option value="36">Pinamungajan</option>
                <option value="37">Poro</option>
                <option value="38">Ronda</option>
                <option value="39">Samboan</option>
                <option value="40">San Fernando</option>
                <option value="41">San Francisco</option>
                <option value="42">San Remigio</option>
                <option value="43">Santa Fe</option>
                <option value="44">Santander</option>
                <option value="45">Sibonga</option>
                <option value="46">Sogod</option>
                <option value="47">Tabugon</option>
                <option value="48">Tabuelan</option>
                <option value="49">Talisay City</option>
                <option value="50">Toledo City</option>
                <option value="51">Tuburan</option>
                <option value="52">Tudela</option>

                `
              );
          } else {
            $("#select_city option").remove();
          }
        }


        if(pdetail.station_name_missing_person == "Parian Police Station") {
           $("#select_station_name").val("0");
        }

        if(pdetail.station_num_missing_person == "Station 1") {
          $("#select_station_num").val("0");
        }

  
    });
  });
  //selection  for city from selected province
  $('#select_prov').on('change', function() {
  
    $('#select_city').removeAttr("disabled");
      var select  = this.value;
    //cebu city
      if (select == 3) {
        $('#select_city').append(
        `
          <option selected>-</option>
          <option value="0">Alcantara</option>
          <option value="1">Alcoy</option>
          <option value="2">Alegria</option>
          <option value="3">Aloguinsan</option>
          <option value="4">Argao</option>
          <option value="5">Asturias</option>
          <option value="6">Badian</option>
          <option value="7">Balamban</option>
          <option value="8">Bogo City</option>
          <option value="9">Bantayan</option>
          <option value="10">Barili</option>
          <option value="11">Boljoon</option>
          <option value="12">Borbon</option>
          <option value="13">Carcar City</option>
          <option value="14">Carmen</option>
          <option value="15">Catmon</option>
          <option value="16">Cebu City</option>
          <option value="17">Compostela</option>
          <option value="18">Consolacion</option>
          <option value="19">Cordova</option>
          <option value="20">Daan Bantayan</option>
          <option value="21">Dalaguete</option>
          <option value="22">Danao</option>
          <option value="23">Dumanjug</option>
          <option value="24">Ginatilan</option>
          <option value="25">Lapu-Lapu City</option>
          <option value="26">Liloan</option>
          <option value="27">Madridejos</option>
          <option value="28">Malabuyoc</option>
          <option value="29">Mandaue City</option>
          <option value="30">Medellin</option>
          <option value="31">Minglanilla</option>
          <option value="32">Moalboal</option>
          <option value="33">Naga City</option>
          <option value="34">Oslob</option>
          <option value="35">Pilar</option>
          <option value="36">Pinamungajan</option>
          <option value="37">Poro</option>
          <option value="38">Ronda</option>
          <option value="39">Samboan</option>
          <option value="40">San Fernando</option>
          <option value="41">San Francisco</option>
          <option value="42">San Remigio</option>
          <option value="43">Santa Fe</option>
          <option value="44">Santander</option>
          <option value="45">Sibonga</option>
          <option value="46">Sogod</option>
          <option value="47">Tabugon</option>
          <option value="48">Tabuelan</option>
          <option value="49">Talisay City</option>
          <option value="50">Toledo City</option>
          <option value="51">Tuburan</option>
          <option value="52">Tudela</option>

          `
        );

      } else {
         $("#select_city option").remove();
      }
  }); //end Select_city

  $('#select_city').on('change', function() {
    var select_city  = this.value;
    //Alcantara
    if (select_city == 0) {
      $('#floatingZip').val('6033');
      $("#select_station_name option").remove();
    }//Alcoy
    else if (select_city == 1) {  
      $('#floatingZip').val('6023');
      $("#select_station_name option").remove();
    }//Alegria
    else if (select_city == 2) {
      $('#floatingZip').val('6030');
      $("#select_station_name option").remove();
    }//Aloguinsan
      else if (select_city == 3) {
      $('#floatingZip').val('6040');
      $("#select_station_name option").remove();
    }//Argao
      else if (select_city == 4) {
      $('#floatingZip').val('6021');
      $("#select_station_name option").remove();
    }//Asturias
    else if (select_city == 5) {
      $('#floatingZip').val('6042');
      $("#select_station_name option").remove();
    }//Badian
    else if (select_city == 6) {
      $('#floatingZip').val('6031');
      $("#select_station_name option").remove();
    }//Balamban
    else if (select_city == 7) {
      $('#floatingZip').val('6041');
      $("#select_station_name option").remove();
    }//Bogo City
    else if (select_city == 8) {
      $('#floatingZip').val('6010');
      $("#select_station_name option").remove();
    }//Bantayan
    else if (select_city == 9) {
      $('#floatingZip').val('6042');
      $("#select_station_name option").remove();
    }//Barili
    else if (select_city == 10) {
      $('#floatingZip').val('6036');
      $("#select_station_name option").remove();
    }//Boljoon
    else if (select_city == 11) {
      $('#floatingZip').val('6024');
      $("#select_station_name option").remove();
    }//Borbon
    else if (select_city == 12) {
      $('#floatingZip').val('6008');
      $("#select_station_name option").remove();
    }//Carcar City
    else if (select_city == 13) {
      $('#floatingZip').val('6019');
      $("#select_station_name option").remove();
    }//Carmen
    else if (select_city == 14) {
      $('#floatingZip').val('6005');
      $("#select_station_name option").remove();
    }//Catmon
    else if (select_city == 15) {
      $('#floatingZip').val('6006');
      $("#select_station_name option").remove();
    }//cebu city
    else if (select_city == 16) {
      $('#select_station_name').append(`
        <option selected>-</option>
        <option value="0">Parian Police Station</option>
        <option value="1">Osmena Blvd. Police Station</option>
        <option value="2">Waterfront Police Station</option>
        <option value="3">Mabolo Police Station</option>
        <option value="4">Carbon Police Station</option>
        <option value="5">Pasil Police Station</option>
        <option value="6">Pardo Police Station</option>
        <option value="7">Talamban Police Station</option>
        <option value="8">Guadalupe Police Station</option>
        <option value="9">Punta Police Station</option>
        <option value="10">Mambaling Police Station</option>
      `);
      $('#floatingZip').val('6000');

    }
    else if (select_city == 17) {
      $('#floatingZip').val('6003');
      $("#select_station_name option").remove();
    }
    else if (select_city == 18) {
      $('#floatingZip').val('6001');
      $("#select_station_name option").remove();
    }
    else if (select_city == 19) {
      $('#floatingZip').val('6017');
      $("#select_station_name option").remove();
    }
    else if (select_city == 20) {
      $('#floatingZip').val('6013');
      $("#select_station_name option").remove();
    }
    else if (select_city == 21) {
      $('#floatingZip').val('6022');
      $("#select_station_name option").remove();
    }
    else if (select_city == 22) {
      $('#floatingZip').val('6004');
      $("#select_station_name option").remove();
    }
    else if (select_city == 23) {
      $('#floatingZip').val('6035');
      $("#select_station_name option").remove();
    }
    else if (select_city == 24) {
      $('#floatingZip').val('6026');
      $("#select_station_name option").remove();
    }
    else if (select_city == 25) {
      $('#floatingZip').val('6015');
      $("#select_station_name option").remove();
    }
    else if (select_city == 26) {
      $('#floatingZip').val('6002');
      $("#select_station_name option").remove();
    }
    else if (select_city == 27) {
      $('#floatingZip').val('6053');
      $("#select_station_name option").remove();
    }
    else if (select_city == 28) {
      $('#floatingZip').val('6029');
      $("#select_station_name option").remove();
    }
    else if (select_city == 29) {
      $('#floatingZip').val('6014');
      $("#select_station_name option").remove();
    }
    else if (select_city == 30) {
      $('#floatingZip').val('6012');
      $("#select_station_name option").remove();
    }
    else if (select_city == 31) {
      $('#floatingZip').val('6046');
      $("#select_station_name option").remove();
    }
    else if (select_city == 32) {
      $('#floatingZip').val('6032');
      $("#select_station_name option").remove();
    }
    else if (select_city == 33) {
      $('#floatingZip').val('6037');
      $("#select_station_name option").remove();
    }
    else if (select_city == 34) {
      $('#floatingZip').val('6012');
      $("#select_station_name option").remove();
    }
    else if (select_city == 35) {
      $('#floatingZip').val('6048');
      $("#select_station_name option").remove();
    }
    else if (select_city == 36) {
      $('#floatingZip').val('6039');
      $("#select_station_name option").remove();
    }
    else if (select_city == 37) {
      $('#floatingZip').val('6049');
      $("#select_station_name option").remove();

    }
    else if (select_city == 38) {
      $('#floatingZip').val('6034');
      $("#select_station_name option").remove();

    }
    else if (select_city == 39) {
      $('#floatingZip').val('6027');
      $("#select_station_name option").remove();
    }
    else if (select_city == 40) {
      $('#floatingZip').val('6018');
      $("#select_station_name option").remove();
    }
    else if (select_city == 41) {
      $('#floatingZip').val('6050');
      $("#select_station_name option").remove();
    }
    else if (select_city == 42) {
      $('#floatingZip').val('6011');
      $("#select_station_name option").remove();
    }
    else if (select_city == 43) {
      $('#floatingZip').val('6047');
      $("#select_station_name option").remove();
    }
    else if (select_city == 44) {
      $('#floatingZip').val('6026');
      $("#select_station_name option").remove();
    }
    else if (select_city == 45) {
      $('#floatingZip').val('6020');
      $("#select_station_name option").remove();
    }
    else if (select_city == 46) {
      $('#floatingZip').val('6007');
      $("#select_station_name option").remove();
    }
    else if (select_city == 47) {
      $('#floatingZip').val('6009');
      $("#select_station_name option").remove();
    }
    else if (select_city == 48) {
      $('#floatingZip').val('6044');
      $("#select_station_name option").remove();
    }
    else if (select_city == 49) {
      $('#floatingZip').val('6045');
      $("#select_station_name option").remove();
    }
    else if (select_city == 50) {
      $('#floatingZip').val('6038');
      $("#select_station_name option").remove();
    }
    else if (select_city == 51) {
      $('#floatingZip').val('6043');
      $("#select_station_name option").remove();
    }
    else if (select_city == 52) {
      $('#floatingZip').val('6051');
      $("#select_station_name option").remove();
    }//Tudela
    else {
      $('#floatingZip').val('');
      $("#select_station_name option").remove();

    }
  });

  $('#select_station_name').on('change', function() {
    var select_station_name = this.value;
      if (select_station_name == 0) {
        $("#select_station_num option[value='0']").prop('selected', true);
    }
    else if (select_station_name == 1) {
        $("#select_station_num option[value='1']").prop('selected', true);
    }
    else if (select_station_name == 2) {
        $("#select_station_num option[value='2']").prop('selected', true);
    }
    else if (select_station_name == 3) {
        $("#select_station_num option[value='3']").prop('selected', true);
    }
    else if (select_station_name == 4) {
        $("#select_station_num option[value='4']").prop('selected', true);
    }
    else if (select_station_name == 5) {
        $("#select_station_num option[value='5']").prop('selected', true);
    }
    else if (select_station_name == 6) {
        $("#select_station_num option[value='6']").prop('selected', true);
    }
    else if (select_station_name == 7) {
        $("#select_station_num option[value='7']").prop('selected', true);
    }
    else if (select_station_name == 8) {
        $("#select_station_num option[value='8']").prop('selected', true);
    }
    else if (select_station_name == 9) {
        $("#select_station_num option[value='9']").prop('selected', true);
    }
    else if (select_station_name == 10) {
        $("#select_station_num option[value='10']").prop('selected', true);
    }
    else {
      $('#select_station_num').val('');
    }

  });


  $('#viewmissingperson').modal({
      backdrop: 'static',
      keyboard: false  // to prevent closing with Esc button (if you want this too)
  });

  $('#edit_missingp').modal({
      backdrop: 'static',
      keyboard: false  // to prevent closing with Esc button (if you want this too)
  });
  $('#closeCaseMissingPerson').modal({
    backdrop: 'static',
    keyboard: false  // to prevent closing with Esc button (if you want this too) 
  });
  //Close 
  $('#closeCaseMissingPerson').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var Id = $(e.relatedTarget).data('closemp-id');
    console.log(Id);
    $(e.currentTarget).find('input[id="id_close_missing_person"]').val(Id);

  });

});