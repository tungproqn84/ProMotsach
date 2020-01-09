$(document).ready(function(){
    $(".nav-tabs a").click(function(){
      $(this).tab('show');
    });
  });

// show infomation
function show(id) {
    $.ajax({
        url    : '/show-bill/' + id,
        type   : "GET",
        success: function(result){
            $('#BillInfomation').html("");
            $('#BillInfomation').html(result);
        }
    });
}