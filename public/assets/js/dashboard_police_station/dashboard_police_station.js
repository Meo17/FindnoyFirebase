$(document).ready(function () {
    // monthly
    $('#month_missing_p').click(function() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();
      var m = yyyy + '-'  + mm;

      data = {
        'monthly' : m
      };
        $.ajax({
          type:"POST",//or POST
          url:'ajax_today_missing_p/',
          data:data,

          success:function(responsedata){
            $('#missing_p_text').html(responsedata);

          }
        });
    });

    //yearly
    $('#yearly_missing_p').click(function() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      data = {
        'yearly' : yyyy
      };
        $.ajax({
          type:"POST",//or POST
          url:'ajax_today_missing_p/',
          data:data,
          success:function(responsedata){
            $('#missing_p_text').html(responsedata);
          }
      });
    });

    // monthly
    $('#month_missing_v').click(function() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();
      var m = yyyy + '-'  + mm;

      data = {
        'monthly' : m
      };
        $.ajax({
          type:"POST",//or POST
          url:'ajax_today_missing_v/',
          data:data,

          success:function(responsedata){
            $('#carnapped_text').html(responsedata);

          }
        });
    });

    //yearly
    $('#yearly_missing_v').click(function() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      data = {
        'yearly' : yyyy
      };
        $.ajax({
          type:"POST",//or POST
          url:'ajax_today_missing_v/',
          data:data,
          success:function(responsedata){
            $('#carnapped_text').html(responsedata);
          }
      });
    });
   
    // monthly
    $('#month_missing_w').click(function() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();
      var m = yyyy + '-'  + mm;
      
      data = {
        'monthly' : m
      };
        $.ajax({
          type:"POST",//or POST
          url:'ajax_today_missing_w/',
          data:data,

          success:function(responsedata){
            $('#wanted_text').html(responsedata);

          }
        });
    });

    //yearly
    $('#yearly_missing_w').click(function() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      data = {
        'yearly' : yyyy
      };
        $.ajax({
          type:"POST",//or POST
          url:'ajax_today_missing_w/',
          data:data,
          success:function(responsedata){
            $('#wanted_text').html(responsedata);
          }
      });
    });

    // modal triggerd 
    $('#verticalycentered2').on('show.bs.modal', function(e) {
        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data('book-id');
        $(e.currentTarget).find('input[id="bookId"]').val(bookId);
    });
    
    $('#verticalycentered3').on('show.bs.modal', function(e) {
        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data('book-id');
        $(e.currentTarget).find('input[id="bookId"]').val(bookId);
    });
});