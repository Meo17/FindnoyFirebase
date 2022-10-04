$(document).ready(function () {
  $('#list_carnapped').addClass("active");
 	$('#case-nav').addClass("show");
  
  // view
  $('#viewcarnapped').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var Id = $(e.relatedTarget).data('car-id');
    $(e.currentTarget).find('input[id="id_car"]').val(Id);

     var carId = $('#id_car').val();
    $('.spinner_car').removeAttr('hidden');
    $(".detail_car").attr("hidden",true);
    $.ajax({
      type : 'GET',
      url :'/view_detail_car',
      data :  { id : carId },
      dataType:'json'
     }).done(function( data ) {
        $(".spinner_car").attr("hidden",true);
        $('.detail_car').removeAttr('hidden');
        var pdetail = data.detail;

        if (pdetail.file_image_carnapped !=""){
          document.getElementById('output').src= pdetail.file_image_carnapped;
        }

        if ( pdetail.file1_image_carnapped !="") {
         document.getElementById('output1').src= pdetail.file1_image_carnapped;
        }
        
        if (pdetail.file2_image_carnapped !=""){
         document.getElementById('output2').src= pdetail.file2_image_carnapped;
        }

        $('#owner_name_carnapped').text(pdetail.owner_name_carnapped);
        $('#color_carnapped').text(pdetail.color_carnapped);
        $('#case_number_carnapped').text(pdetail.case_number_carnapped);
        $('#plate_number_carnapped').text(pdetail.plate_number_carnapped);
        $('#select_vehicle_carnapped').text(pdetail.select_vehicle_carnapped);
        $('#other_carnapped').text(pdetail.other_carnapped);
        $('#police_officer_carnapped').text(pdetail.police_officer_carnapped); 
        $('#date_lost_carnapped').text(pdetail.date_lost_carnapped);
        $('#date_reported_carnapped').text(pdetail.date_reported_carnapped);
        $('#attached_file1_carnapped').text(pdetail.attached_file1_carnapped);
        $('#attached_file2_carnapped').text(pdetail.attached_file2_carnapped);
        $('#attached_file3_carnapped').text(pdetail.attached_file3_carnapped);
        $('#attached_file4_carnapped').text(pdetail.attached_file4_carnapped);
        $('#attached_file5_carnapped').text(pdetail.attached_file5_carnapped);

        $('#attached_file1_carnapped').click(function() { 
           document.location = pdetail.attached_file1_carnapped;
        });

        $('#attached_file2_carnapped').click(function() { 
           document.location = pdetail.attached_file2_carnapped;
        });

        $('#attached_file3_carnapped').click(function() { 
           document.location = pdetail.attached_file3_carnapped;
        });

        $('#attached_file4_carnapped').click(function() { 
           document.location = pdetail.attached_file4_carnapped;
        });
        
        $('#attached_file5_carnapped').click(function() { 
           document.location = pdetail.attached_file5_carnapped;
        });
        
    });
  });

  $('#viewcarnapped').modal({
      backdrop: 'static',
      keyboard: false  // to prevent closing with Esc button (if you want this too)
  });
  $('#edit_carnapped').modal({
      backdrop: 'static',
      keyboard: false  // to prevent closing with Esc button (if you want this too)
  });

  // edit
  $('#edit_carnapped').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var Id = $(e.relatedTarget).data('edit-id');
    $(e.currentTarget).find('input[id="id_update_carnapped"]').val(Id);

     var editId = $('#id_update_carnapped').val();
    $('.spinner_view_carnapped').removeAttr('hidden');
    $(".view_edit_carnapped").attr("hidden",true);
    $.ajax({
      type : 'GET',
      url :'/view_detail_car',
      data :  { id : editId },
      dataType:'json'
     }).done(function( data ) {
        $(".spinner_view_carnapped").attr("hidden",true);
        $('.view_edit_carnapped').removeAttr('hidden');
        var pdetail = data.detail;
        var officer = pdetail.police_officer_carnapped;

        if (pdetail.file_image_carnapped !=""){
          document.getElementById('output3').src= pdetail.file_image_carnapped;
        }

        if ( pdetail.file1_image_carnapped !="") {
         document.getElementById('output4').src= pdetail.file1_image_carnapped;
        }
        
        if (pdetail.file2_image_carnapped !=""){
         document.getElementById('output5').src= pdetail.file2_image_carnapped;
        }


        $('input[name="owner_name_carnapped"]').val(pdetail.owner_name_carnapped);
        $('input[name="color_carnapped"]').val(pdetail.color_carnapped);
        $('input[name="case_number_carnapped"]').val(pdetail.case_number_carnapped);
        $('input[name="plate_number_carnapped"]').val(pdetail.plate_number_carnapped);
        $('input[name="other_carnapped"]').val(pdetail.other_carnapped);
        $('input[name="date_lost_carnapped"]').val(pdetail.date_lost_carnapped);
        $('input[name="date_reported_carnapped"]').val(pdetail.date_reported_carnapped);

        $('select[name="select_vehicle_carnapped"] option[value='+pdetail.select_vehicle_carnapped+']').attr('selected','selected');
        $('select[name="police_officer_carnapped"] option[value="' + officer + '"]').attr('selected','selected');

        $('#attached_file1_carnapped1').text(pdetail.attached_file1_carnapped);
        $('#attached_file2_carnapped2').text(pdetail.attached_file2_carnapped);
        $('#attached_file3_carnapped3').text(pdetail.attached_file3_carnapped);
        $('#attached_file4_carnapped4').text(pdetail.attached_file4_carnapped);
        $('#attached_file5_carnapped5').text(pdetail.attached_file5_carnapped);

        $('#attached_file1_carnapped1').click(function() { 
           document.location = pdetail.attached_file1_carnapped;
        });

        $('#attached_file2_carnapped2').click(function() { 
           document.location = pdetail.attached_file2_carnapped;
        });

        $('#attached_file3_carnapped3').click(function() { 
           document.location = pdetail.attached_file3_carnapped;
        });

        $('#attached_file4_carnapped4').click(function() { 
           document.location = pdetail.attached_file4_carnapped;
        });
        
        $('#attached_file5_carnapped5').click(function() { 
           document.location = pdetail.attached_file5_carnapped;
        });


    });
  });

  //Close 
  $('#closeCaseCarnapped').on('show.bs.modal', function(e) {
  //get data-id attribute of the clicked element
  var Id = $(e.relatedTarget).data('close-id');
    $(e.currentTarget).find('input[id="id_close_carnapped"]').val(Id);
  });
  
});

  //preview
  var output3 = function(event) {
    var output = document.getElementById('output3');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  //preview1
  var output4 = function(event) {
    var output = document.getElementById('output4');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  //preview2
    var output5 = function(event) {
    var output = document.getElementById('output5');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
    }
  };