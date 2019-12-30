<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-2 col-md-2"></div>
				<div class="col-xs-12 col-sm-4 col-md-4 col -6">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="{{Route('home')}}"><i class="fa fa-angle-double-right"></i>Trang chủ</a></li>
						<li><a href="https://goo.gl/maps/FxHoGBWqWNsR98u57"><i class="fa fa-angle-double-right"></i>Địa chỉ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Bắt đầu xem</a></li>
						<li><a href="https://www.youtube.com/?gl=VN"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-6">
                    <h5>Góp ý với chúng tôi</h5>
                <form action="{{Route('feedback')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row" style="margin-left: 10px;">
                        <textarea name="feedback" placeholder="Nhập góp ý về dịch vụ của chúng tôi"></textarea>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <button type="submit" class="btn btn-success">Gửi góp ý</button>
                    </div>
                    </form>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="https://goo.gl/maps/FxHoGBWqWNsR98u57" target="_blank">Nhà sách Mọt Sách - TP. ĐÀ Nẵng</a></u> - Bản quyền thuộc về Nhà sách Mọt Sách</p>
					<p class="h6">&copy All right Reversed 2020.<a class="text-green ml-2" href="https://www.youtube.com/" target="_blank">Subscribe</a></p>
				</div>
				</hr>
			</div>
		</div>
	</section>
	<!-- ./Footer -->
