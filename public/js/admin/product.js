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
// CKeditor
CKEDITOR.replace( 'Detail' );