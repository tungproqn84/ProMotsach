<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin/product.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 offset-sm-1">
                <div class="row">
                    <div class="col-sm-12" id="title"><span>Chi tiết danh mục</span><hr></div>
                </div>
                <div class="row">
                    <div class="col-sm-12" id="productInfomation">
                        <ul>
                            <li>
                                <label for="">Tên sản phẩm: </label>
                                <span>{{ $product->PName }}</span>
                            </li>
                            <li>
                                <label>Tác giả:</label>
                                <span>{{ $product->PAuthor }}</span>
                            </li>
                            <li>
                                <label>Đơn giá:</label>
                                <span>{{ $product->PPrice }}</span>
                            </li>
                            <li>
                                <label>Số lượng hiện tại:</label>
                                <span>{{ $product->PAmount }}</span>
                            </li>
                            <!-- <li>
                                <label>Danh mục:</label>
                                <span> $portfolio->PortfolioName </span>
                            </li>
                            <li>
                                <label>Thể loại:</label>
                                <span> $category->CategoryName </span>
                            </li> -->
                            <li>
                                <label>Ngày phát hành sản phẩm:</label>
                                <span>{{ $product->PStartDay }}</span>
                            </li>
                            <li>
                                <label>Trạng thái: </label>
                                @if($product->PStatus == 1)
                                    <span style="color: green;">Đang hoạt động</span>
                                @else
                                    <span style="color: red;">Ngừng hoạt động</span>
                                @endif
                            </li>
                            <li>
                                <label>Doanh thu trung bình hàng tháng:</label>
                            </li>
                            <li>
                                <label>Chi tiết sản phẩm:</label><br>
                                {!! $product->PDetail !!}
                            </li>
                            
                        </ul>
                    </div>
                </div><hr>
            </div>
            <div class="col-sm-2" id="action">
                <div class="row">
                    <div class="col-sm-12 col-4">
                        <button class="btn btn-success"><i class="fas fa-edit"></i> Sửa</button>
                    </div>
                    <div class="col-sm-12 col-4">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
        <script>
    CKEDITOR.replace( 'Detail' );
    </script>
    <script type="text/javascript" src="{{asset('js/admin/product.js')}}"></script>
</body>
</html>