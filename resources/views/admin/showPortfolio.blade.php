<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin/portfolio.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12" id="title"><span>Chi tiết danh mục</span><hr></div>
                </div>
                <div class="row">
                    <div class="col-sm-12" id="portfolioInfomation">
                        <ul>
                            <li>
                                <label for="">Danh mục: </label>
                                <span>{{$portfolio->PortfolioName}}</span>
                            </li>
                            <li>
                                <label>Trạng thái: </label>
                                @if($portfolio->PortfolioStatus == 0)
                                    <span style="color: green;">Đang hoạt động</span>
                                @else
                                    <span style="color: red;">Ngừng hoạt động</span>
                                @endif
                            </li>
                            <li>
                                <label>Mô tả:</label><br>
                                <span>{{$portfolio->PortfolioDescription}}</span>
                            </li>
                            <li>
                                <label>Tổng số lượng sách:</label>
                            </li>
                            <li>
                                <label>Doanh thu trung bình hàng tháng:</label>
                            </li>
                        </ul>
                    </div>
                </div><hr>
            </div>
            <div class="col-sm-3" id="action">
                <div class="row">
                    <div class="col-sm-12 col-4">
                        <button class="btn btn-info"><i class="fas fa-plus-circle"></i> Thêm thể loại</button>
                    </div>
                    <div class="col-sm-12 col-4">
                        <button class="btn btn-success" onclick="edit({{ $portfolio->PortfolioID }})"><i class="fas fa-edit"></i> Sửa</button>
                    </div>
                    <div class="col-sm-12 col-4">
                        <button class="btn btn-danger" id="btnDeletePortfolio" onclick="location.href='delete-portfolio/{{ $portfolio->PortfolioID }}'"><i class="fas fa-trash-alt"></i> Xóa</button>
                    </div>
                </div>
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