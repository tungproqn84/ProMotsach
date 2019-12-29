// ajax-thêm danh mục sản phẩm
    $(document).ready(function() {
        $("#btnAddPortfolio").click(function() {
            $.ajax({
                url    : "/add-portfolio",
                type   : "GET",
                data   : null,
                success: function(result){
                    $('#FunctionPortfolio').html(result);
                },
            });
        });

        //showInformation
        
    });
    
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