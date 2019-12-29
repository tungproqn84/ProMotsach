<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/admin/signup.css">
<script src="js/admin/signup.js"></script>
<script type="text/javascript" src="https://itexpress.vn/js/noel.js"></script>
<!------ Include the above in your HEAD tag ---------->
<form action="postsignin"  method="post"name="myForm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="container-fluid">
		<div class="row">
			<div class="well center-block">
				<div class="well-header">
					<h3 class="text-center text-success"> Đăng kí ngay ! </h3>
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
                <span>Mật khẩu <span id="b"> *</span></span>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-lock"></i>
								</div>
								<input type="password" minlength="8" maxlength="20" placeholder="Mật khẩu" name="password" class="form-control">
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
                <span>Giới tính <span id="b"> *</span></span>
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</div>
                                <input type="radio" name="gender" value="nam"> Nam
                                <input type="radio"  name="gender" value="nu"> Nữ
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
								<textarea class="form-control" name="address" placeholder="Địa chỉ của bạn *"></textarea>
							</div>
						</div>
					</div>
				</div>
                <span>Ngày sinh <span id="b"> *</span></span>
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
                                </div>
								<input type="date" name="dob" class="form-control" id="datepicker">
							</div>
						</div>
					</div>
				</div>

				<div class="row widget">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<button class="btn btn-warning btn-block" type="submit"> Đăng kí ngay </button>
					</div>
                </div>
            </form>
			</div>
		</div>
	</div>

