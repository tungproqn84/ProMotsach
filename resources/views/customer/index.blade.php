
@extends('customer/master')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chủ- Nhà sách Mọt sách</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn0.fahasa.com/media/magentothem/banner7/Week1T12020_MainBanner_920x420.jpg" width="100%" style="height: 350px;">
            </div>
            @foreach ($slide as $sl)
            <div class="carousel-item">
                    <img src="{{$sl->image}}" width="100%" style="height: 350px;">
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <div class="container-fluid">
        <div class="row" id="infor">
            <div class="col-sm-auto"></div>
            <div class="col-sm-3">
                <div id="box-infor">
                    <img src="http://heabea.vn/public/themes/images/certificate.png" id="imgbox">
                    <span>GIẤY PHÉP KINH DOANH</span>
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                <div id="box-infor">
                    <img src="http://heabea.vn/public/themes/images/warrenty.png" id="imgbox">
                    <span>CAM KẾT SẢN PHẨM</span>
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                <div id="box-infor">
                    <img src="https://mpng.pngfly.com/20171128/3bf/transparent-owl-with-book-png-clipart-picture-5a1d4eea72d575.9840075615118701864704.jpg" id="imgbox">
                    <span>PHÙ HỢP MỌI LỨA TUỔI</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            {{-- <div class="row">
                Menu
            </div> --}}
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sản phẩm bán chạy <hr></h4>

                    </div>
                </div>
                <div class="row" id=box-product>
                            @foreach ($hot as $pd )
                            <div class="col-sm-3 col-6 thumbnail">
                                <img src="{{$pd->PImage}}" id="image">
                                <div class="caption">
                                <center><h5>{{$pd->PName}}</h5></center>
                                <center>{{number_format($pd->PPrice)}}</center>
                                <p align="center"><a href="../detailproduct/{{$pd->PID}}" class="btn btn-primary btn-block">Xem chi tiết</a></p>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-12">
                            <center><a href="../seeadd/1">Xem thêm >></a></center>
                        </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sản phẩm HOT <hr></h4>

                    </div>
                </div>
                <div class="row" id=box-product>
                            @foreach ($sale as $pd )
                            <div class="col-sm-3 col-6 thumbnail">
                                <img src="{{$pd->PImage}}" id="image">
                                <div class="caption">
                                <center><h5>{{$pd->PName}}</h5></center>
                                <center>{{number_format($pd->PPrice)}}</center>
                                <p align="center"><a href="../detailproduct/{{$pd->PID}}" class="btn btn-primary btn-block">Detail</a></p>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-12">
                            <center><a href="../seeadd/2">Xem thêm >></a></center>
                        </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sản phẩm khác <hr></h4>

                    </div>
                </div>
                <div class="row" id=box-product>
                            @foreach ($product as $pd )
                            <div class="col-sm-3 col-6 thumbnail">
                                <img src="{{$pd->PImage}}" id="image">
                                <div class="caption">
                                <center><h5>{{$pd->PName}}</h5></center>
                                <center>{{number_format($pd->PPrice)}}</center>
                                <p align="center"><a href="../detailproduct/{{$pd->PID}}" class="btn btn-primary btn-block">Xem chi tiết</a></p>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-12">
                            <center><a href="../seeadd/3">Xem thêm >></a></center>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
