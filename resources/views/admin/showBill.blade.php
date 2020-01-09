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
                <h4>Người gửi</h4>
                <p>admin</p>
                <p>Quận Ngũ Hành Sơn, Thành phố Đà Nẵng</p>
                <p>Số điện thoại: 0123456789</p>
                <p>Email: motsach@gmail.com</p>
            </div>
            <div class="col-sm-4">
                <h4>Người nhận</h4>
                <p>{{ $customer->CusName }}</p>
                <p>Địa chỉ: {{ $customer->CusAddress }}</p>
                <p>Số điện thoại: {{ $customer->Cellphone }}</p>
                <p>Email: {{ $customer->Email }}</p>
            </div>
            <div class="col-sm-4">
                <h4>Thông tin đơn hàng</h4>
                <p>Mã đơn hàng: </p>
                <p>Ngày đặt:</p>
                <p>Tài khoản: </p>
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
                    
                        <tr>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                        </tr>
                    
                </table>
            </div>
        </div>
        <span><hr></span>
        <div class="row">
            <div class="col-sm-6 offset-sm-6">sss</div>
        </div>
    </div>
    
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>


    <script type="text/javascript" src="{{asset('js/admin/bill.js')}}"></script>
</body>
</html>
