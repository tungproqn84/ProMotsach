@extends('customer/master')
@section('content')
{{-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
<link rel="stylesheet" href="../css/cart.css">
<!------ Include the above in your HEAD tag ---------->
<div class="container-fluid">
    <div class="col-sm-12 ">
        <div class="row">
            @if(count($cart)>0)
            <table class="table">
                <th id="image-box"></th>
                <th id="name"></th>
                <th id="qty">Số lượng</th>
                <th id="price">Đơn giá</th>
                <form action="../update" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @foreach ($cart as $ca )
                        <div id="product">
                        @foreach($pro as $p)
                            @if($p->PID==$ca->id)
                                <tr>
                                    <td>
                                        <input type="hidden" name="id" value="{{$ca->id}}">
                                        <input type="hidden" name="rowId" value="{{$ca->rowId}}">
                                        <a class="" href="../detailproduct/{{$ca->id}}">
                                            <img class="media-object" src="{{$ca->image}}" id="image">
                                        </a>
                                    </td>
                                    <td>
                                        <h5><a href="../detailproduct/{{$ca->id}}">{{$ca->name}}</a></h5>
                                        <h6> Tác giả : <a href="../author/{{$p->PAuthor}}">{{$p->PAuthor}}</a></h6>
                                        <a href="../delete/{{$ca->rowId}}">
                                            <button type="button" class="btn btn-danger">Xóa</button>
                                        </a>
                                    </td>
                                    <td id="qty">
                                        <input type="number" value="{{$ca->qty}}" name="qty" min="0" max="5">
                                    </td>
                                    <td>
                                        <span>{{number_format($ca->price)}}đ</span>
                                    </td>
                                    {{-- <td>
                                        <a href="../delete/{{$ca->rowId}}">
                                            <button type="button" class="btn btn-danger">Xóa</button>
                                        </a>
                                    </td> --}}
                                </tr>
                            @endif
                        @endforeach
                        </div>
                    @endforeach
                    <tr>
                        <td colspan="2"><h4>Tổng cộng</h4></td>
                        <td colspan="2">
                            <?php echo Cart::subtotal() ." VND"; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{Route('home')}}">
                                <button type="button" class="btn btn-info">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Tiếp tục mua
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="/xoa"><button type="button" class="btn btn-success">Xóa giỏ hàng</button></a>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </td>
                        <td>
                            <a href="../buy">
                                <button type="button" class="btn btn-success">
                                    Thanh toán ngay <span class="glyphicon glyphicon-play"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
                </form>
            </table>
            @else
                <p>Không còn sản phẩm nào trong giỏ hàng của bạn.<a href="{{Route('home')}}"><button type="button" class="btn btn-success"> Mua ngay</button></a></p>
            @endif
        </div>
    </div>
</div>
@endsection
