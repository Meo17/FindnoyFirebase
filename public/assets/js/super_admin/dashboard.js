$(document).ready(function () {

    $('#verticalycentered-1').on('show.bs.modal', function(e) {
        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data('book-id');
        $(e.currentTarget).find('input[id="bookId"]').val(bookId);
    });

    $('#verticalycentered1').on('show.bs.modal', function(e) {
        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data('book-id');
        $(e.currentTarget).find('input[id="bookId"]').val(bookId);
    });
    
});
