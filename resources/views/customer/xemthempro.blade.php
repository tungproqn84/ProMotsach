@extends('customer/master')
@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sản phẩm- Nhà sách Mọt sách</title>
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
                <img src="https://images2.minutemediacdn.com/image/upload/c_crop,h_2146,w_3819,x_0,y_200/f_auto,q_auto,w_1100/v1565275119/shape/mentalfloss/gettyimages-938171020.jpg" width="100%" style="height: 400px;">
            </div>
            @foreach ($slide as $sl)
            <div class="carousel-item">
                    <img src="{{$sl->image}}" width="100%" style="height: 400px;">
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
        <div class="col-md-3" style="border: 1px solid aqua">
            <div class="row">
                Menu
            </div>
        </div>
        <div class="col-md-9">
            {{-- Xem thêm sản phẩm khác --}}
            @if($type=='product')
            <div class="row">

                <div class="col-sm-12">
                    @if($id==1)
                    <h4>Sản phẩm bán chạy <hr></h4>
                    @elseif($id==2)
                    <h4>Sản phẩm HOT <hr></h4>
                    @else
                    <h4>Sản phẩm khác <hr></h4>
                    @endif
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
                        <div class="col-sm-12">
                            {{$product->links()}}
                        </div>
                    </div>
            </div>
            @elseif($type=='author')
            {{-- Xem thêm theo tên tác giả --}}
            <div class="row">
                <div class="col-sm-12">
                    <h4>Tác phẩm cùng tác giả <hr></h4>

                </div>
            </div>
            <div class="row" id=box-product>
                        @foreach ($product as $pd )
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
                        {{$product->links()}}
                    </div>
            </div>
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
                {{$product->links()}}
            </div>
    </div>
            @else
                {{-- Tìm kiếm sản phẩm theo tên --}}
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Kết quả tìm kiếm có {{count($product)}} sản phẩm <hr></h4>

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
                            {{$product->links()}}
                        </div>
                </div>

            @endif
        </div>
    </div>

</body>
</html>
@endsection
