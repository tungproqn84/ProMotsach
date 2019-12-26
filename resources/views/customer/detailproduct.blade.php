@extends('customer/master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6">
                    <img src="{{$product->PImage}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6">
                        <h4 id="name">{{$product->PName}}</h4>
                    <span>Tác giả : {{$product->PAuthor}}</span>
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
                        <a href="../cart/{{$product->PID}}"> <button type="button" class="btn btn-primary" id="btn"><i class="fa fa-shopping-cart"></i> Đặt ngay</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

