$(document).ready(function() {
    $("#btnAddProduct").click(function() {
        $.ajax({
            url   : "/add-product",
            type  : "GET",
            data  : null,
            success: function(result) {
                $('#FunctionProduct').html(result);
            },
        });
    });


});


// show infomation
function show(id) {
    $.ajax({
        url    : '/show-product/' + id,
        type   : "GET",
        success: function(result){
            $('#FunctionProduct').html("");
            $('#FunctionProduct').html(result);
        }
    });
}
