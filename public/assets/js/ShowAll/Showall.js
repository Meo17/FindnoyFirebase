$(document).ready(function () {
    $('#showall').addClass("active");
    $('#forms-nav').addClass("show");   

});



function addRowHandlers() {
    var table = document.getElementById("tableId");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler = 
            function(row) 
            {
                return function() { 
              var cell = row.getElementsByTagName("td")[0];
              var id = cell.innerHTML;
              alert("id:" + id);
        };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
}
window.onload = addRowHandlers();

$(document).ready(function () {
                $(document).on('mouseenter', '.divbutton', function () {
                    $(this).find(":button").show();
                }).on('mouseleave', '.divbutton', function () {
                    $(this).find(":button").hide();
                });
            });
function myFunction() {
    location.replace("extend_showall_superadmin")
}
