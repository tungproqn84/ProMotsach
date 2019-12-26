<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="{{asset('js/admin/portfolio.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/admin/portfolio.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row" id="FormAddPortfolio">
            <div class="col-8" id="titleBox"><span>THÊM DANH MỤC</span><hr></div>
            <div class="col-8">
                <label for="PortfolioName" value="">Tên danh mục</label><br>
                <input type="text" name="PortfolioName" id="PortfolioName">
            </div>
            <div class="col-8">
                <label for="PortfolioDescription">Mô tả</label><br>
                <textarea  name="PortfolioDescription" id="PortfolioDescription"></textarea><hr>
            </div>
            <hr>
            <div class="col-8">
                <div class="row" id="button">
                    <div class="col-6">
                        <button class="btn btn-primary">Tạo mới danh mục</button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-danger">Hủy bỏ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>