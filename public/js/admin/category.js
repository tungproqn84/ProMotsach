$(document).ready(function() {
    $("#btnAddCategory").click(function() {
        $.ajax({
            url   : "/add-category",
            type  : "GET",
            data  : null,
            success: function(result) {
                $('#FunctionCategory').html(result);
            },
        });
    });
});
// show infomation
function show(id) {
    $.ajax({
        url    : '/show-category/' + id,
        type   : "GET",
        success: function(result){
            $('#FunctionCategory').html("");
            $('#FunctionCategory').html(result);
        }
    });
}