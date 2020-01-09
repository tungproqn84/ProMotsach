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
    @include('admin.navbar')
    <div class="container-fluid" id="BillContainer">
        <div class="row">
            <div class="col-sm-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="nav-oldBills-tab" data-toggle="tab" href="#nav-oldBills" role="tab" aria-controls="nav-oldBills" aria-selected="false">Hóa đơn cũ</a>
                        <a class="nav-item nav-link active" id="nav-newBills-tab" data-toggle="tab" href="#nav-newBills" role="tab" aria-controls="nav-newBills" aria-selected="true">Hóa đơn mới</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-oldBills" role="tabpanel" aria-labelledby="nav-oldBills-tab">
                    <h3>Hóa đơn cũ</h3>
                        <table class="table table-light table-striped">
                            <tr>
                                <th width="10%">STT</th>
                                <th width="30%">Khách hàng</th>
                                <th width="30%">Tổng tiền</th>
                                <th width="30%">Thời gian</th>
                            </tr>
                            @foreach($bills as $bill)
                                @if($bill->BillStatus == 1)
                                    <tr>
                                        <td>{{ $bill->Bill_ID }}</td>
                                        @foreach($customers as $customer)
                                            @if($bill->CusID == $customer->CusID)
                                                <td>{{ $customer->CusName }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ number_format($bill->Total) }}</td>
                                        <td>{{ $bill->BillDate }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="tab-pane fade show active" id="nav-newBills" role="tabpanel" aria-labelledby="nav-newBills-tab">
                    <h3>Hóa đơn mới</h3>
                        <table class="table table-light table-striped">
                            <tr>
                                <th width="10%">STT</th>
                                <th width="30%">Khách hàng</th>
                                <th width="30%">Tổng tiền</th>
                                <th width="30%">Thời gian</th>
                            </tr>
                            @foreach($bills as $bill)
                                @if($bill->BillStatus == 0)
                                    <tr onclick="show({{ $bill->Bill_ID }})">
                                        <td>{{ $bill->Bill_ID }}</td>
                                        @foreach($customers as $customer)
                                            @if($bill->CusID == $customer->CusID)
                                                <td><span>{{ $customer->CusName }}</span></td>
                                            @endif
                                        @endforeach
                                        <td>{{ $bill->Total }}</td>
                                        <td>{{ $bill->BillDate }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-8" id="BillInfomation"></div>
        </div>
    </div>
    
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>


    <script type="text/javascript" src="{{asset('js/admin/bill.js')}}"></script>
</body>
</html>
