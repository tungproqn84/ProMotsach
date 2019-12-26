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

        //showInformation
        
    });
    // thôi để t fix biến tí nữa^^
    // ừm.. thôi học bài phần chú đi nè có học gì đâu :v giờ ngồi support được :v v fix giúp với . t mới "hello world ajax^^"  này lỗi bên laravel mà :<

    function show(id) {
        $.ajax({
            url    : '/show-portfolio/' + id,
            type : "GET",
            // data   : {s:s},
            success: function(result){
                $('#FunctionPortfolio').html("");
                $('#FunctionPortfolio').html(result);
                // $('#showInfo').prop('disable', true);
                // console.log(result)
            },
        });
    }