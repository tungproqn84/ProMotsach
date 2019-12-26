<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin/home.css')}}">
    <script src="{{asset('js/admin/calencar.js')}}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>ADMIN| Home</title>
</head>
<body>
    @include('admin/navbar')
    <div class="container" id="DashboardContainer">
        <div class="row">
            <div class="col-sm-3 col-6" id="NewBills">
                <div id="dashboard">
                    <p id="amount">//Số lượng//</p>
                    <p id="name">Đơn hàng mới</p>
                    <a href="#">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="col-sm-3 col-6" id="Products">
                <div id="dashboard">
                    <p id="amount">//Số lượng//</p>
                    <p id="name">Sách</p>
                    <a href="#">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="col-sm-3 col-6" id="UserRegistrations">
                <div id="dashboard">
                    <p id="amount">//Số lượng//</p>
                    <p id="name">Người dùng đăng kí</p>
                    <a href="#">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="col-sm-3 col-6" id="Revenue">
                <div id="dashboard">
                    <p id="amount">//Số lượng//</p>
                    <p id="name">Doanh thu</p>
                    <a href="#">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
                <div class="elegant-calencar">
                    <p id="reset">Reset</p>
                    <div id="header" class="clearfix">
                        <div class="pre-button"><</div>
                            <div class="head-info">
                                <div class="head-day"></div>
                                <div class="head-month"></div>
                            </div>
                        <div class="next-button">></div>
                    </div>
                    <table id="calendar">
                        <thead>
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>