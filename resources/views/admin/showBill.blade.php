<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/admin/bill.css')}}">
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ADMIN| Danh mục</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">Mọt sách</div>
            <div class="col-sm-4">{{ $billDate }}</div>
        </div>
        <span><hr></span>
        <div class="row">
            <div class="col-sm-4">
                <span id="titleInfo">Người gửi</span>
                <ul>
                    <li>admin</li>
                    <li>Địa chỉ: Quận Ngũ Hành Sơn, Thành phố Đà Nẵng</li>
                    <li>Số điện thoại: 0123456789</li>
                    <li>Email: motsach@gmail.com</li>
                </ul>
            </div>
            <div class="col-sm-4">
                <span id="titleInfo">Người nhận</span>
                <ul>
                    <li>{{ $customer->CusName }}</li>
                    <li>Địa chỉ: {{ $customer->CusAddress }}</li>
                    <li>Số điện thoại: {{ $customer->Cellphone }}</li>
                    <li>Email: {{ $customer->Email }}</li>
                </ul>
            </div>
            <div class="col-sm-4">
                <span id="titleInfo">Thông tin đơn hàng</span>
                <ul>
                    <li>Mã đơn hàng: {{ $bill->Bill_ID }}</li>
                    <li>Ngày đặt: {{ $bill->created_at }}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            @foreach($orders as $order)
                                @if($order->PID == $product->PID)
                                <td>{{ $product->PName }}</td>
                                <td>{{ $order->Amount }}</td>
                                <td>{{ $product->PPrice }}</td>
                                <td>{{ $order->Amount*$product->PPrice}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <span><hr></span>
        <div class="row">
            <div class="col-sm-6 offset-sm-6">
                <h3>Xác nhận đơn hàng</h3>
                <ul>
                    <li>Tổng tiền: {{number_format($total = $bill->Total)}} VND</li>
                    <li>Thuế (0.5%): {{number_format($tax = $total*0.05)}} VND</li>
                    <li>Phí vận chuyển: {{number_format($shipfee = 20000)}} VND</li>
                    <li>Tổng: {{number_format($total - $tax - $shipfee)}} VND</li>
                </ul>
                <div class="row">
                    <div class="col-sm-6"><button class="btn btn-primary">Xác nhận đơn hàng</button></div>
                    <div class="col-sm-6"><button class="btn btn-danger">Hủy bỏ</button></div>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>


    <script type="text/javascript" src="{{asset('js/admin/bill.js')}}"></script>
</body>
</html>
