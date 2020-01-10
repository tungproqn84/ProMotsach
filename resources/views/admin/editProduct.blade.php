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
    <form action="{{ route('update-product') }}" method="post">
    {{csrf_field()}}
        <div class="container">
            <div class="row" id="InfomationBox">
                <div class="col-sm-9  offset-sm-1">
                    <div class="row">
                        <div class="col-sm-12" id="titleBox">
                            <span>THÊM SẢN PHẨM MỚI</span><hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul>
                                <input type="hidden" id="PID" name="PID" value="{{ $product->PID }}">

                                <li><label for="ProductName">Tên sách</label></li>
                                <li><input type="text" id="ProductName" name="ProductName" value="{{ $product->PName }}"></li>
                                <li><label for="Author">Tác giả</label></li>
                                <li><input type="text" id="Author" name="Author" value="{{ $product->PAuthor }}"></li>
                                <li><label for="Porfolio">Danh mục</label></li>
                                <li>
                                    <select name="Portfolio" id="Portfolio">
                                        @foreach($portfolios as $portfolio)
                                            @if($portfolio->PortfolioID == $product->PPortfolio)
                                                <option value="{{ $portfolio->PortfolioID }}" selected>{{ $portfolio->PortfolioName }}</option>
                                            @else
                                                <option value="{{ $portfolio->PortfolioID }}">{{ $portfolio->PortfolioName }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </li>
                                <li><label for="Category">Thể loại</label></li>
                                <li>
                                    <select name="Category" id="Category">
                                        @foreach($categories as $category)
                                            @if($category->CategoryyID = $product->PCategory)
                                                <option value="{{ $category->CategoryyID }}" selected>{{ $category->CategoryName }}</option>
                                            @else
                                                <option value="{{ $category->CategoryyID }}">{{ $category->CategoryName }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </li>
                                <li><label for="Price">Đơn giá</label></li>
                                <li><input type="text" id="Price" name="Price" value="{{ $product->PPrice }}"></li>
                                <li><label for="Amount">Số lượng</label></li>
                                <li><input type="text" id="Amount" name="Amount" value="{{ $product->PAmount }}"></li>
                                <li><label for="Image">Ảnh minh họa</label></li>
                                <li><input type="text" id="Image" name="Image" require="true" value="{{ $product->PImage }}"></li>
                                <li><label for="Detail">Chi tiết</label></li>
                                <li>
                                    <textarea name="Detail" id="Detail">{{ $product->PDetail }}</textarea>
                                </li>
                                <li><label for="Status">Trạng thái</label></li>
                                <li>
                                    @if($product->ProductStatus = 1)
                                        <input type="radio" id="Status" name="Status" value="1" checked>Kích hoạt
                                        <input type="radio" id="Status" name="Status" value="2">Tạm hoãn
                                    @else
                                        <input type="radio" id="Status" name="Status" value="1">Kích hoạt
                                        <input type="radio" id="Status" name="Status" value="2" checked>Tạm hoãn
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-8 offset-sm-4" id="action">
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" class="btn btn-primary" value="Xác nhận chỉnh sửa">
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
    </form>   
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'Detail' );
    </script>
    <script type="text/javascript" src="{{asset('js/admin/product.js')}}"></script>
</body>
</html>