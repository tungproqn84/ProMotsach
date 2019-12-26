// ajax-thêm danh mục sản phẩm
    $(document).ready(function() {
        $("#btnAddPortfolio").click(function() {
            var s = "s";
            $.ajax({
                url    : "/add-portfolio",
                type : "GET",
                data   : {s:s},
                success: function(result){
                    $('#FunctionPortfolio').html(result);
                },
            });
        });
    });

