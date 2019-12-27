@extends('customer/master')
@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container" style="margin-left: 23%">
        <div class="row">
            <div id="demo" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>

      <!-- The slideshow -->
      <div class="carousel-inner">
          @foreach ($slide as $sl)
            <div class="carousel-item active">
                    <img src="{{$sl->image}}" width="100%" alt="Los Angeles">
            </div>
          @endforeach
      </div>
      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-md-3" style="border: 1px solid aqua">
            <div class="row">
                Menu
            </div>
        </div>
        <div class="col-md-9">
            <div class="row" id=box-product>
                <h4>Sản phẩm bán chạy <hr></h4>
                <ul class="thumbnails">
                    @foreach ($hot as $pd )
                    <li class="span3">
                    <div class="thumbnail">
                    <img src="{{$pd->PImage}}" id="image">
                        <div class="caption">
                        <center><h5>{{$pd->PName}}</h5></center>
                        <center>{{number_format($pd->PPrice)}}</center>
                        <p align="center"><a href="../detailproduct/{{$pd->PID}}" class="btn btn-primary btn-block">Detail</a></p>
                        </div>
                    </div>
                    </li>
                    @endforeach
                <center><a href="../seeadd/1">Xem thêm >></a></center>
                </ul>
            </div>

            <div class="row">
                <h4>Sản phẩm khuyến mãi <hr></h4>
                <ul class="thumbnails">
                    @foreach ($sale as $pd )
                    <li class="span3">
                    <div class="thumbnail">
                    <img src="{{$pd->PImage}}" id="image">
                        <div class="caption">
                        <center><h5>{{$pd->PName}}</h5></center>
                        <center>{{number_format($pd->PPrice)}}</center>
                        <p align="center"><a href="../detailproduct/{{$pd->PID}}" class="btn btn-primary btn-block">Detail</a></p>
                        </div>
                    </div>
                    </li>
                    @endforeach
                    <center><a href="../seeadd/2">Xem thêm >></a></center>
                </ul>

            </div>
            <div class="row">
                <h4>Sản phẩm khác <hr></h4>
                <ul class="thumbnails">
                    @foreach ($product as $pd )
                    <li class="span3">
                    <div class="thumbnail">
                    <img src="{{$pd->PImage}}" id="image">
                        <div class="caption">
                        <center><h5>{{$pd->PName}}</h5></center>
                        <center>{{number_format($pd->PPrice)}}</center>
                        <p align="center"><a href="../detailproduct/{{$pd->PID}}" class="btn btn-primary btn-block">Detail</a></p>
                        </div>
                    </div>
                    </li>
                    @endforeach
                    <center><a href="../seeadd/3">Xem thêm >></a></center>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
