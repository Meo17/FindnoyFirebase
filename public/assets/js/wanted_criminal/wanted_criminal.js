$(document).ready(function () {
  $('#list_wanted_criminal').addClass("active");
  $('#case-nav').addClass("show");


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
        $('#fname_wanted_criminals').text(vdetail.fname_wanted_criminals);
        $('#m_wanted_criminals').text(vdetail.m_wanted_criminals);
        $('#lname_wanted_criminals').text(vdetail.lname_wanted_criminals);
        $('#wanted_alias').text(vdetail.nickname_wanted_criminals);
        $('#case_number_wanted_criminals').text(vdetail.case_number_wanted_criminals);
        $('#case_file_wanted_criminals').text(vdetail.case_file_wanted_criminals);
        $('#select_tags_wanted_criminals').text(vdetail.select_tags_wanted_criminals);
        $('#bounty_wanted_criminals').text(vdetail.bounty_wanted_criminals);
        $('#police_officer_wanted_criminals').text(vdetail.police_officer_wanted_criminals);
        $('#date_filed_wanted_criminals').text(vdetail.date_filed_wanted_criminals);
        document.getElementById('image_wanted').src= vdetail.file_image_wanted_criminals;
    });
  });

  $('#viewwantedcriminal').modal({
      backdrop: 'static',
      keyboard: false  // to prevent closing with Esc button (if you want this too)
  });

  $('#edit_wanted').modal({
      backdrop: 'static',
      keyboard: false  // to prevent closing with Esc button (if you want this too)
  });

  $('#edit_wanted').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var Id = $(e.relatedTarget).data('edit-id');
    $(e.currentTarget).find('input[id="id_edit_wanted"]').val(Id);

     var editId = $('#id_edit_wanted').val();
    $('.spinner_view_wanted').removeAttr('hidden');
    $(".view_edit_wanted").attr("hidden",true);
    $.ajax({
      type : 'GET',
      url :'/view_detail',
      data :  { id : editId },
      dataType:'json'
     }).done(function( data ) {
        $(".spinner_view_wanted").attr("hidden",true);
        $('.view_edit_wanted').removeAttr('hidden');
        var vdetail = data.detail;
        var officer = vdetail.police_officer_wanted_criminals;
        
        if (vdetail.file_image_wanted_criminals !=""){
          document.getElementById('output6').src= vdetail.file_image_wanted_criminals;
        }

        $('input[name="fname_wanted_criminals"]').val(vdetail.fname_wanted_criminals)
        $('input[name="m_wanted_criminals"]').val(vdetail.m_wanted_criminals);
        $('input[name="lname_wanted_criminals"]').val(vdetail.lname_wanted_criminals);
        $('input[name="nickname_wanted_criminals"]').val(vdetail.nickname_wanted_criminals);
        $('input[name="case_number_wanted_criminals"]').val(vdetail.case_number_wanted_criminals);
        $('input[name="case_file_wanted_criminals"]').val(vdetail.case_file_wanted_criminals);
        $('select[name="select_tags_wanted_criminals"] option[value='+vdetail.select_tags_wanted_criminals+']').attr('selected','selected');
        $('input[name="bounty_wanted_criminals"]').val(vdetail.bounty_wanted_criminals);
        $('select[name="police_officer_wanted_criminals"] option[value="' + officer + '"]').attr('selected','selected');
        $('input[name="date_filed_wanted_criminals"]').val(vdetail.date_filed_wanted_criminals);

    });
  });

  //Close 
  $('#closeCaseWanted').on('show.bs.modal', function(e) {
  //get data-id attribute of the clicked element
  var Id = $(e.relatedTarget).data('close-id');
    $(e.currentTarget).find('input[id="id_close_wanted"]').val(Id);
  });

  
});
  //preview
  var output6 = function(event) {
    var output = document.getElementById('output6');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };