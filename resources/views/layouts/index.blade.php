{{-- @extends('layouts.index')
@section('css')
<link rel="stylesheet" href="{{ url('/font-end/css/css-index/css-slideshow.css') }}" />
@endsection
@section('content')
@include('pages.slide')
@endsection --}}

<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Khách Sạn UTT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="hotel, utt" />
    <meta name="author" content="FREEHTML5.CO" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <link rel="shortcut icon" href="favicon.ico">
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="{{ asset('font-end/page/css/superfish.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/page/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/page/css/cs-select.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/page/css/cs-skin-border.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/page/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/page/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/page/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/page/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/page/css/style.css') }}">
        


    <link href="{{ asset('font-end/admin/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-end/admin/css/startmin.css') }}" rel="stylesheet">
    <link href="{{ asset('font-end/admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .img2 {
            width: 550px;
            height: 450px;
            background-color: #3e3e3e;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }

    </style>

    @yield('css')

</head>

<body>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">
            <div id="fh5co-header">
                <header id="fh5co-header-section">
                    <div class="container">
                        <div class="nav-header">
                            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
                            <h1 id="fh5co-logo"><a href="{{ route('website') }}">VTC</a></h1>
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <li><a href="{{ route('website') }}">Trang chủ</a></li>
                                    <li>
                                        <a href="{{ route('booking') }}" class="fh5co-sub-ddown">Đặt phòng</a>
                                    </li>
                                    <li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
                                    <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
                                    <li><a href="{{ route('mybooking') }}"><i class="fa fa-shopping-cart"></i>  My Booking</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>

            </div>
            <!-- end:fh5co-header -->

            @yield('content')

            <footer id="footer" class="fh5co-bg-color">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="copyright">
                                <p><small>&copy; 2024 Khách sạn vtc. <br>
                                        Thiết kế bởi <a href="#" target="_blank">Nhóm CNTT1A</a></small></p>
                                <ul class="link">
                                    <li><small><a href="#">Hoàng Lê Minh Tuấn</a></small></li>
                                    <li><small><a href="#">Nguyễn Văn Sơn</a></small></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Lối tắt</h2>
                                    <ul class="link">
                                        <li><a href="{{ route('website') }}">Trang chủ</a></li>
                                        <li><a href="{{ route('booking') }}">Đặt phòng</a></li>
                                        <li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
                                        <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
                                        <li><a href="{{ route('admin.dangnhap') }}">Đăng nhập</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h2>Nhận thông tin</h2>
                                    <p>Nhận thông tin khuyến mãi sớm nhất.</p>
                                    <form action="#" id="form-subscribe">
                                        <div class="form-field">
                                            <input type="email" placeholder="Nhập địa chỉ email" id="email">
                                            <input type="submit" id="submit" value="Gửi">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="social-icons">
                                <li>
                                    <a href="http://twitter.com"><i cla ss="icon-twitter-with-circle"></i></a>
                                    <a href="http://facebook.com"><i class="icon-facebook-with-circle"></i></a>
                                    <a href="http://instagram.com"><i class="icon-instagram-with-circle"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->
    @yield('script')

    <!-- Javascripts -->

    
    <script src="{{ asset('font-end/page/js/jquery-2.1.4.min.js') }}"></script>

    <!-- Dropdown Menu -->
    <script src="{{ asset('font-end/page/js/hoverIntent.js') }}"></script>
    <script src="{{ asset('font-end/page/js/superfish.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('font-end/page/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('font-end/page/js/jquery.waypoints.min.js') }}"></script>
    <!-- Counters -->
    <script src="{{ asset('font-end/page/js/jquery.countTo.js') }}"></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('font-end/page/js/jquery.stellar.min.js') }}"></script>
    <!-- Owl Slider -->
    <!-- // <script src="js/owl.carousel.min.js"></script> -->
    <!-- Date Picker -->
    <script src="{{ asset('font-end/page/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- CS Select -->
    <script src="{{ asset('font-end/page/js/classie.js') }}"></script>
    <script src="{{ asset('font-end/page/js/selectFx.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('font-end/page/js/jquery.flexslider-min.js') }}"></script>

    <script src="{{ asset('font-end/page/js/custom.js') }}"></script>

</body>

</html>
