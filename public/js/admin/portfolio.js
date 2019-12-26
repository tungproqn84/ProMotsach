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

    // ajax hiển thị thông tin danh mục
    $(document).ready(function() {
        $("#showInfo").click(function() {
            var s = "s";
            $.ajax({
                url    : "/show-portfolio/{id}",
                type : "GET",
                data   : {s:s},
                success: function(result){
                    $('#FunctionPortfolio').html(result);
                },
            });
        });
    });

