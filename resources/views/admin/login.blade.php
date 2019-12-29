<link rel="stylesheet" href="css/admin/signup.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="js/admin/signup.js"></script>
<script type="text/javascript" src="https://itexpress.vn/js/noel.js"></script>
<!------ Include the above in your HEAD tag ---------->
<body>
<form action="../postlogin" name="myForm" method="post" onsubmit="return(validate());">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="container-fluid">
		<div class="row">
			<div class="well center-block">
				<div class="well-header">
					<h3 class="text-center text-success"> Đăng nhập !</h3>
					<hr>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
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
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</div>
								<input type="password" placeholder="Mật khẩu" name="password" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="row widget">
					<div class="col-md-12 col-xs-12 col-sm-12">
                        <button class="btn btn-info btn-block" type="submit"> Đăng nhập </button>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <span> Bạn chưa có tài khoản ? <a href="signin">Đăng kí ngay</a></span>
                    </div>
				</div>
			</div>
		</div>
	</div>


</form>
</body>


