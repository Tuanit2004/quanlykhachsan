<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html,
        body,
        .wrapper {
            background: #f7f7f7;
        }

        .steps {
            margin-top: -41px;
            display: inline-block;
            float: right;
            font-size: 16px
        }

        .step {
            float: left;
            background: white;
            padding: 7px 13px;
            border-radius: 1px;
            text-align: center;
            width: 100px;
            position: relative
        }

        .step_line {
            margin: 0;
            width: 0;
            height: 0;
            border-left: 16px solid #fff;
            border-top: 16px solid transparent;
            border-bottom: 16px solid transparent;
            z-index: 1008;
            position: absolute;
            left: 99px;
            top: 1px
        }

        .step_line.backline {
            border-left: 20px solid #f7f7f7;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            z-index: 1006;
            position: absolute;
            left: 99px;
            top: -3px
        }

        .step_complete {
            background: #357ebd
        }

        .step_complete a.check-bc,
        .step_complete a.check-bc:hover,
        .afix-1,
        .afix-1:hover {
            color: #eee;
        }

        .step_line.step_complete {
            background: 0;
            border-left: 16px solid #357ebd
        }

        .step_thankyou {
            float: left;
            background: white;
            padding: 7px 13px;
            border-radius: 1px;
            text-align: center;
            width: 100px;
        }

        .step.check_step {
            margin-left: 5px;
        }

        .ch_pp {
            text-decoration: underline;
        }

        .ch_pp.sip {
            margin-left: 10px;
        }

        .check-bc,
        .check-bc:hover {
            color: #222;
        }

        .SuccessField {
            border-color: #458845 !important;
            -webkit-box-shadow: 0 0 7px #9acc9a !important;
            -moz-box-shadow: 0 0 7px #9acc9a !important;
            box-shadow: 0 0 7px #9acc9a !important;
            background: #f9f9f9 url(../images/valid.png) no-repeat 98% center !important
        }

        .btn-xs {
            line-height: 28px;
        }

        /*login form*/
        .login-container {
            margin-top: 30px;
        }

        .login-container input[type=submit] {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            position: relative;
        }

        .login-container input[type=text],
        input[type=password] {
            height: 44px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 10px;
            -webkit-appearance: none;
            background: #fff;
            border: 1px solid #d9d9d9;
            border-top: 1px solid #c0c0c0;
            /* border-radius: 2px; */
            padding: 0 8px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .login-container input[type=text]:hover,
        input[type=password]:hover {
            border: 1px solid #b9b9b9;
            border-top: 1px solid #a0a0a0;
            -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .login-container-submit {
            /* border: 1px solid #3079ed; */
            border: 0px;
            color: #fff;
            text-shadow: 0 1px rgba(0, 0, 0, 0.1);
            background-color: #357ebd;
            /*#4d90fe;*/
            padding: 17px 0px;
            font-family: roboto;
            font-size: 14px;
            /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
        }

        .login-container-submit:hover {
            /* border: 1px solid #2f5bb7; */
            border: 0px;
            text-shadow: 0 1px rgba(0, 0, 0, 0.3);
            background-color: #357ae8;
            /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
        }

        .login-help {
            font-size: 12px;
        }

        .asterix {
            background: #f9f9f9 url(../images/red_asterisk.png) no-repeat 98% center !important;
        }

        /* images*/
        ol,
        ul {
            list-style: none;
        }

        .hand {
            cursor: pointer;
            cursor: pointer;
        }

        .cards {
            padding-left: 0;
        }

        .cards li {
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -ms-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
            background-position: 0 0;
            float: left;
            height: 32px;
            margin-right: 8px;
            text-indent: -9999px;
            width: 51px;
        }

        .cards .mastercard {
            background-position: -51px 0;
        }

        .cards li {
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -ms-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
            background-position: 0 0;
            float: left;
            height: 32px;
            margin-right: 8px;
            text-indent: -9999px;
            width: 51px;
        }

        .cards .amex {
            background-position: -102px 0;
        }

        .cards li {
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -ms-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
            background-position: 0 0;
            float: left;
            height: 32px;
            margin-right: 8px;
            text-indent: -9999px;
            width: 51px;
        }

        .cards li:last-child {
            margin-right: 0;
        }

        /* images end */



        /*
 * BOOTSTRAP
 */
        .container {
            border: none;
        }

        .panel-footer {
            background: #fff;
        }

        .btn {
            border-radius: 1px;
        }

        .btn-sm,
        .btn-group-sm>.btn {
            border-radius: 1px;
        }

        .input-sm,
        .form-horizontal .form-group-sm .form-control {
            border-radius: 1px;
        }

        .panel-info {
            border-color: #999;
        }

        .panel-heading {
            border-top-left-radius: 1px;
            border-top-right-radius: 1px;
        }

        .panel {
            border-radius: 1px;
        }

        .panel-info>.panel-heading {
            color: #eee;
            border-color: #999;
        }

        .panel-info>.panel-heading {
            background-image: linear-gradient(to bottom, #555 0px, #888 100%);
        }

        hr {
            border-color: #999 -moz-use-text-color -moz-use-text-color;
        }

        .panel-footer {
            border-bottom-left-radius: 1px;
            border-bottom-right-radius: 1px;
            border-top: 1px solid #999;
        }

        .btn-link {
            color: #888;
        }

        hr {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        /** MEDIA QUERIES **/
        @media only screen and (max-width: 989px) {
            .span1 {
                margin-bottom: 15px;
                clear: both;
            }
        }

        @media only screen and (max-width: 764px) {
            .inverse-1 {
                float: right;
            }
        }

        @media only screen and (max-width: 586px) {
            .cart-titles {
                display: none;
            }

            .panel {
                margin-bottom: 1px;
            }
        }

        .form-control {
            border-radius: 1px;
        }

        @media only screen and (max-width: 486px) {
            .col-xss-12 {
                width: 100%;
            }

            .cart-img-show {
                display: none;
            }

            .btn-submit-fix {
                width: 100%;

            }

        }

        /*
@media only screen and (max-width: 777px){
    .container{
        overflow-x: hidden;
    }
}*/

    </style>
</head>

<body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container wrapper" style="padding-bottom: 10rem">
        <div class="row cart-head">
            <div class="container" style="padding-bottom: 5rem; padding-top: 2rem;">
                <div class="nav-header">
                    <a href="{{ route('website') }}"><img src="{{ url('upload/page/logo.png') }}" alt="" width="100px"
                            height="100px"></a>
                    <span> KHÁCH SẠN UTT</span>
                </div>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading" style="color: white; background: #db4118;">
                Ngày check in, check out:
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-xs-12">
                        <strong>Check in: </strong>
                        @if (Session::has('std') != null)
                            {{ Session::get('std') }}
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <strong>Check in: </strong>
                        @if (Session::has('end') != null)
                            {{ Session::get('end') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="{{ route('payment.postPayment') }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading" style="color: white; background: #db4118;">
                            Chi tiết đặt phòng <div class="pull-right"><small><a class="afix-1"
                                        href="{{ route('mybooking') }}">Quay lại trang đặt
                                        phòng</a></small>
                            </div>
                        </div>
                        <div class="panel-body">

                            @if (Session::has('Cart') != null)
                                @foreach (Session::get('Cart')->phong as $item)
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive"
                                                src="{{ url('/upload/phong/' . $item['phongInfo']->hinhanh) }}" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">{{ $item['phongInfo']->tenphong }}</div>
                                            <div class="col-xs-12"><small>Số lượng:
                                                    <span>{{ $item['soluong'] }}</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <h6><span>{{ number_format($item['phongInfo']->gia) }}</span>
                                                VNĐ</h6>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <hr />
                                    </div>
                                @endforeach
                            @endif

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng số phòng:</strong>
                                    <div class="pull-right"><span>
                                            @if (isset(Session::get('Cart')->tongSoluong))
                                                {{ number_format(Session::get('Cart')->tongSoluong) }}
                                            @endif
                                        </span><span>phòng</span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <hr />
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng số tiền</strong>
                                    <div class="pull-right"><span>
                                            @if (isset(Session::get('Cart')->tongGia))
                                                {{ number_format(Session::get('Cart')->tongGia) }}
                                            @endif
                                        </span><span> VNĐ</span></div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading" style="color: white; background: #db4118;">Thông tin khách hàng</div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                @foreach ($errors->all() as $err)
                                    {{ $err }}<br>
                                @endforeach
                            </div>
                        @endif
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="name">Họ và tên:</label>
                                    <input type="text" name="name" id="name" class="form-control" value=""
                                        placeholder="Điền họ và tên" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" value=""
                                        placeholder="Điền địa chỉ email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="sdt">Số điện thoại:</label>
                                    <input type="text" name="sdt" id="sdt" class="form-control" value=""
                                        placeholder="Điền số điện thoại" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="diachi">Địa chỉ:</label>
                                    <textarea type="text" name="diachi" id="diachi" class="form-control" rows="4"
                                        placeholder="Điền địa chỉ"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="chuthich">Ghi chú:</label>
                                    <textarea type="text" name="chuthich" id="chuthich" class="form-control" rows="6"
                                        placeholder="Điền ghi chú"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="thanhtoan">Phương thức thanh toán:</label>
                                    <br>
                                    <select name="thanhtoan" id="thanhtoan">
                                        <option value="" disabled selected>Chọn phương thức</option>
                                        <option value="bank">Thẻ ngân hàng</option>
                                        <option value="visa">Thẻ visa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix"
                                        style="background: #db4118">Đặt phòng </button>
                                </div>
                            </div>
                        </div>
                    </div>

            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>
</body>


<script type="text/javascript">
    $(".alert").fadeTo(2000, 500).slideUp(500, function() {
        $(".alert").slideUp(500);
    });
</script>


</html>
