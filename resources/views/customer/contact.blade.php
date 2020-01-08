@extends('customer/master')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="../css/contact.css">
<script>
    function alert(){
        window.alert('Cảm ơn bạn đã liên hệ. ');
    }
</script>
<head>
    <title>Liên hệ với chúng tôi- Nhà sách Mọt sách</title>
    <style>
        body{
            font-size: 15px !important;
        }
        input{
            font-size: 15px !important;
        }
        button{
            font-size: 15px !important;
        }
        textarea{
            width: 100%;
        }
    </style>
</head>

<!------ Include the above in your HEAD tag ---------->
<form action="{{route('contact')}}"  method="post"name="myForm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="container">
		<div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-8">
                <div class="well ">
                    <center><h2>THÔNG TIN LIÊN HỆ</h2></center>
                    <hr>
                <div class="row">
                    <div class="">
                        <div class="col-sm-8">
                            <input type="text" name="name"  id="box" placeholder="Họ tên của bạn *">
                        </div>
                        <div class="col-sm-8">
                            <input type="email" id="box" name="email" placeholder="Email của bạn *">
                        </div>
                        <div class="col-sm-8">
                            <input type="text" id="box" name="mobile" placeholder="Số điện thoại *">
                        </div>
                        <div class="col-sm-8">
                            <input type="text" id="box" name="address" placeholder="Địa chỉ liên hệ *">
                        </div>
                        <div class="col-sm-8">
                            <textarea name="message" id="box" cols="10" rows="5" placeholder="Lời nhắn của bạn (nếu có)"></textarea>
                        </div>
                        <div class="col-sm-10">
                            <center><button type="submit" class="btn btn-info" onclick="alert()">Gửi thông tin</button></center>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10" id="box-hd">
                    <span >* Cuộc sống ta sẽ cảm thấy hạnh phúc và vui vẻ nếu chúng ta biết cách cho đi.
                        Cảm ơn bạn đã ghé website của chúng tôi.
                        Vui lòng nhập thông tin liên hệ để chúng tôi có thể liên lạc với bạn.
                        Những cuốn sách bạn đưa sẽ góp phần tạo nên giá trị mới cho xã hội và môi trường.</span>
                </div>
                </div>

                </div>

            </div>
		</div>
	</div>
@endsection
