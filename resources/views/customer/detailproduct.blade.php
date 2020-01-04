@extends('customer/master')
@section('content')
<head>
    <title>Chi tiết sản phẩm- Nhà sách Mọt sách</title>
    <link rel="stylesheet" href="../css/detail.css">
    <link rel="stylesheet" href="../ckeditor/ckeditor.js">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <br>
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6">
                    <img src="{{$product->PImage}}" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6">
                        <h4 id="name">{{$product->PName}}</h4>
                        <span>Tác giả : {{$product->PAuthor}}</span><br>
                        <span>Giá bán: {{number_format($product->PPrice)}}đ</span>
                        <div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
							</div>
							</div>
                        <!-- Split button -->

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="../cart/{{$product->PID}}"> <button type="button" class="btn btn-primary" id="btn"> Đặt ngay</button></a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="well well-sm">
                <h2>Thông tin sách</h2>
                <hr>
                <span id="detail">{!! $product->PDetail !!}</span>
                <hr>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="well well-sm">
                <h3>Bình luận</h3>
                <div class="well well-sm">
                    <div class="row">
                        <div id=avatar>
                            <img src="https://i.pinimg.com/736x/e3/f3/4d/e3f34de992ae4267f272550a5935447f.jpg" height="50px" id="img">
                        </div>
                        <div>
                            <span>Thanh Tùng</span>
                            <span id="time">30 phút trước</span>
                        </div>
                    </div>
                    <div class="row">
                        <span id="comment">Sách đọc rất hay, bảo quản tốt. Tuy là sách cũ nhưng tôi rất hài lòng. Sẽ ủng hộ tiếp</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="well">
            <span>Sản phẩm cùng loại</span>
        </div>
    </div>
    <div class="row" id="formm">
        @foreach ($more_product as $more)
            <div class="col-sm-3 sp">
                <a href="../detailproduct/{{$more->PID}}">
                    <center><img src="{{$more->PImage}}" id="imgmore"></center>
                    <div class="row" id="namep">
                        <!-- <center><span>$more->PName</span></center> -->
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    </div>
@endsection

