@extends('master')
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
                        <form action="" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="number" min="0" max="5" value="0" name="amount">
                            <button type="submit" class="btn btn-primary" id="btn">Đặt ngay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

