<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
$cart=Cart::content();
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            @if(count($cart)>0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Tổng tiền</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <form action="../update" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @foreach ($cart as $ca )
                            <tr>
                            <input type="hidden" name="id" value="{{$ca->id}}">
                                <td class="col-sm-8 col-md-6">
                                <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{$product->PImage}}" style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$ca->name}}</a></h4>
                                    <h5 class="media-heading"> by <a href="#">{{$product->PAuthor}}</a></h5>
                                        <span>Status: </span><span class="text-success"><strong>
                                            @if($product->PStatus==0)
                                            Hiện chưa bán
                                            @else
                                            Đang hoạt động
                                            @endif
                                        </strong></span>
                                    </div>
                                </div></td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    <input type="number" class="form-control" value="{{$ca->qty}}" name="qty">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center">
                                    <strong>
                                        @if($product->PSale==0)
                                            {{number_format($product->PPrice)}}
                                        @else
                                            {{number_format(($product->PPrice)-($product->PPrice)*($product->PSale))}}
                                        @endif
                                    </strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{number_format($ca->subtotal)}}</strong></td>
                                <td class="col-sm-1 col-md-1">
                                <a href="../delete/{{$ca->id}}"><button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </button></a></td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h5>Phí vận chuyển</h5></td>
                            <td class="text-right"><h5><strong>25.000 VND</strong></h5></td>
                        </tr> --}}
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?php echo Cart::subtotal() ." VND"; ?></strong></h3></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>
                                <button type="submit" class="btn btn-success">
                                    Cập nhật <span class="glyphicon glyphicon-play"></span>
                                </button>
                            </td>
                            <td><a href="/xoa"><button type="button" class="btn btn-success">Xóa giỏ hàng</button></a></td>
                            <td>
                                <a href="{{Route('home')}}">
                                    <button type="button" class="btn btn-info">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Tiếp tục mua
                                    </button>
                                </a>
                            </td>
                            <td>
                            <button type="button" class="btn btn-success">
                                Thanh toán ngay <span class="glyphicon glyphicon-play"></span>
                            </button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
            @else
                <p>Không còn sản phẩm nào trong giỏ hàng của bạn.<a href="{{Route('home')}}"><button type="button" class="btn btn-success"> Mua ngay</button></a></p>
            @endif
        </div>
    </div>
</div>
