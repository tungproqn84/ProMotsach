<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mọt sách | Phản hồi</title>
</head>
<body>
@extends('customer/master')
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="../css/feedback.css">
<div class="container" id="main">
    <div class="col-sm-12">
        <center><h1 id="title"> Góp ý về chất lượng dịch vụ</h1></center>
        <div class="form-area">
            <form>
            <br style="clear:both">
                        <h3 style="margin-bottom: 25px; text-align: center;"></h3>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên của bạn *">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email của bạn *" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Số điện thoại *" >
                        </div>
                        <div class="form-group">
                            <select name="type" id="">
                                <option value="1">Khen thưởng</option>
                                <option value="2">Góp ý phát triển</option>
                                <option value="3">Phản ánh chất lượng</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <textarea class="form-control" type="textarea" id="message" placeholder="Ý kiến bạn đọc *" maxlength="140" rows="7"></textarea>
                        </div>
            <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Gửi ý kiến</button>
            </form><br><br><br>
            <div class="row">
                <span> * Chúng tôi luôn mong chờ những ý kiến từ bạn đọc để phục vụ đọc giả một cách tốt nhất có thể. Cảm ơn bạn đã tin tưởng và ủng hộ chúng tôi. Để biết thêm thông tin, hãy <a href="../gioithieu"> nhấn vào đây .</a></span>
            </div>
        </div>
    </div>

    </div>
@endsection

</body>
</html>