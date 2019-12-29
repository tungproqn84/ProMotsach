<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/admin/product.css')}}">
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row" id="InfomationBox">
            <div class="col-sm-9  offset-sm-1">
                <div class="row">
                    <div class="col-sm-12" id="titleBox">
                        <span>THÊM SẢN PHẨM MỚI</span><hr>
                    </div>
                </div>
                <div class="row">
                    <ul>
                        <li><label for="ProductName">Tên sách</label></li>
                        <li><input type="text" id="ProductName" name="ProductName"></li>
                        <li><label for="Author">Tác giả</label></li>
                        <li><input type="text" id="Author" name="Author"></li>
                        <li><label for="Porfolio">Danh mục</label></li>
                        <li>
                            <!-- <input type="text" id="Porfolio" name="Porfolio"> -->
                            <select name="Porfolio" id="Porfolio">
                                @foreach($portfolios as $portfolio)
                                    <option value="{{ $portfolio->PortfolioID }}">{{ $portfolio->PortfolioName }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li><label for="Category">Thể loại</label></li>
                        <li><input type="text" id="Category" name="Category"></li>
                        <li><label for="Price">Đơn giá</label></li>
                        <li><input type="text" id="Price" name="Price"></li>
                        <li><label for="Amount">Số lượng</label></li>
                        <li><input type="text" id="Amount" name="Amount"></li>
                        <li><label for="Image">Ảnh minh họa</label></li>
                        <li><input type="file" id="Image" name="Image"></li>
                        <li><label for="Detail">Chi tiết</label></li>
                        <li>
                            <!-- <input type="text" id="Detail" name="Detail"> -->
                            <textarea name="Detail" id="Detail"></textarea>
                        </li>
                        <li><label for="Status">Trạng thái</label></li>
                        <li>
                            <input type="radio" id="Status" name="Status" value="Kích hoạt">Kích hoạt
                            <input type="radio" id="Status" name="Status" value="Tạm hoãn">Tạm hoãn
                        </li>
                    </ul>
                </div><hr>
                <div class="row">
                    <div class="col-sm-8 offset-sm-4">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary">Thêm sản phẩm</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-danger">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/admin/product.js')}}"></script>
</body>
</html>