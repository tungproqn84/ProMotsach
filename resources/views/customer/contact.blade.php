@extends('customer/master')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/admin/signup.css">
<script src="js/admin/signup.js"></script>
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
<form action="postsignin"  method="post"name="myForm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="container">
		<div class="row">
			<div class="well center-block">
				<div class="well-header">
                    <h3 class="text-center text-success"> Liên hệ ! <br><center>(Nhượng sách cũ lại cho chúng tôi)</center></h3>
					<hr>
                </div>
                <form action="{{Route('postsignin')}}" method="post" name="myForm"  onsubmit="return(validate());">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <span>Họ tên của bạn <span id="b"> *</span></span>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</div>
								<input type="text" placeholder="Họ tên của bạn" name="name" class="form-control">
							</div>
						</div>
					</div>
				</div>
                <span>Email <span id="b"> *</span></span>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</div>
								<input type="text" placeholder="Email" name="email" class="form-control">
							</div>
						</div>
					</div>
				</div>
                <span>Số điện thoại <span id="b"> *</span></span>
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-phone"></i>
								</div>
								<input type="number" minlength="10" maxlength="12" class="form-control" name="mobile" placeholder="Số điện thoại của bạn">
							</div>
						</div>
					</div>
				</div>
                <span>Địa chỉ <span id="b"> *</span></span>
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-list-alt"></i>
								</div>
								<input type="text" class="form-control" name="address" placeholder="Địa chỉ của bạn *">
							</div>
						</div>
					</div>
				</div>
                <span>Hình ảnh sản phẩm <span id="b"> *</span></span>
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<input type="file" name="dob" class="form-control" id="datepicker">
							</div>
						</div>
					</div>
				</div>
                <span>Ghi chú (nếu có) </span>
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<textarea name="note" colspan="8"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="row widget">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<button class="btn btn-warning btn-block" type="submit"> Xác nhận </button>
					</div>
                </div>
            </form>
			</div>
		</div>
	</div>


@endsection
