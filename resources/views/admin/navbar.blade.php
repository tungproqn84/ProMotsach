<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="{{asset('css/admin/navbar.css')}}">

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">ADMINISTRATOR</div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin-home') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-home"></i> Trang chủ</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fas fa-id-card"></i> Hồ sơ cá nhân</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fas fa-file-invoice-dollar"></i> Doanh thu</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fas fa-users"></i> Khách hàng</a>
                    <a href="{{ route('admin-portfolio') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-layer-group"></i> Danh mục sản phẩm</a>
                    <a href="{{ route('admin-category') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-layer-group"></i> Thể loại</a>
                    <a href="{{ route('admin-product') }}" class="list-group-item list-group-item-action bg-light"><i class="fab fa-product-hunt"></i> Sản phẩm</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fas fa-piggy-bank"></i> Khuyến mãi</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fas fa-file-invoice"></i> Đơn hàng</a>
                </div>
                <div class="sidebar-footing">
                    <ul>
                        <button class="btn btn-primary" title="Danh mục"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-primary" title="Danh mục"><i class="fas fa-phone"></i></button>
                        <button class="btn btn-primary" title="Danh mục"><i class="fas fa-map-marker-alt"></i></button>
                    </ul>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom fixed-top">
                    <!-- button danh mục -->
                    <button class="btn btn-primary" id="menu-toggle" title="Danh mục"><i class="fas fa-stream"></i></button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <!-- Search form -->
                                <form class="form-inline">
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Tìm kiếm" aria-label="Search">
                                </form>
                            </li>
                            <!-- icon thông báo -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Thông báo"><i class="fas fa-bell"></i><span class="sr-only">(current)</span></a>
                            </li>
                            <!-- icon tin nhắn -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Tin nhắn"><i class="fas fa-comments"></i></a>
                            </li>
                            <!-- icon dropdown mục khác -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Mục khác"><i class="fas fa-th-large"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <ul>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- icon đăng xuất -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Đăng xuất"><i class="fas fa-sign-out-alt"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
            <!-- /#wrapper -->

            <!-- Menu Toggle Script -->
            <script>
                $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
                });
            </script>
    </body>
</html>