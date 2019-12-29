<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/admin/product.css')}}">
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @include('admin/navbar')
    <div class="container-fluid">
        <div class="row" id="ProductContainer">
            <div class="col-sm-5" id="DisplayProduct">
                <div class="row" id="titleBox">
                    <div class="col-8"><span>THÔNG TIN SẢN PHẨM</span></div>
                    <div class="col-4">
                        <button class="btn btn-primary" id="btnAddProduct"><i class="fas fa-plus-circle"></i> Thêm sản phẩm mới</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" id="dataBox">
                        <table class="table table-light table-striped">
                            <tr>
                                <th width="5%">STT</th>
                                <th width="50%">Tên sản phẩm</th>
                                <th width="25%">Tác giả</th>
                                <th width="20%">Trạng thái</th>
                            </tr>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->count() }}</td>
                                <td>
                                    <span class="showInfo" onclick="show({{ $product->PID }})">{{ $product->PName }}</span>
                                </td>
                                <td>{{ $product->PAuthor }}</td>
                                <td>{{ $product->PStatus }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="row" id="FunctionProduct"></div>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('js/admin/product.js')}}"></script>
</body>
</html>