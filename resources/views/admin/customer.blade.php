<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin/customer.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
@include('admin/navbar')
    <div class="container" id="CustomerContainer">
        <div class="row">
            <!-- Hiển thị danh sách khách hàng đang sử dụng -->
            <div class="col-sm-11" id="DisplayCustomer">
                <div class="row" id="titleBox">
                    <div class="col-8">
                        <span>DANH SÁCH KHÁCH HÀNG</span>
                    </div>
                    <!-- <div class="col-4">
                        <button class="btn btn-primary" id="btnAddPortfolio"><i class="fas fa-plus-circle"></i> Tạo mới</button>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-sm-12" id="dataBox">
                        <table class="table table-light table-striped table-reponsive">
                            <tr>
                                <th width="5%">STT</th>
                                <th width="15%">Họ và tên</th>
                                <th width="8%">Giới tính</th>
                                <th width="15%">Ngày sinh</th>
                                <th width="12%">Số điện thoại</th>
                                <th width="18%">Địa chỉ</th>
                                <th width="15%">Email</th>
                                <th width="12%">Mật khẩu</th>
                            </tr>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->count()}}</td>
                                    <td>
                                        <span class="showInfo" onclick="show({{ $customer->CusID }})">{{ $customer->CusName }}</span>
                                    </td>
                                    @if($customer->Gender==1)
                                        <td>Nam</td>
                                    @else
                                        <td>Nữ</td>
                                    @endif
                                    <td>{{ $customer->DayOfBirth }}</td>
                                    <td>{{ $customer->Cellphone }}</td>
                                    <td>{{ $customer->CusAddress }}</td>
                                    <td>{{ $customer->Email }}</td>
                                    <td>{{ $customer->Password }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="row" id="FunctionCustomer"></div>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    
    
    <script type="text/javascript" src="{{asset('js/admin/portfolio.js')}}"></script>
</body>
</html>