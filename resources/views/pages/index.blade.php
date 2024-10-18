@extends('layouts.index')
@section('content')

    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url({{ url('upload/slide/111.jpg') }});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-12 col-md-offset-0 text-center slider-text">
                            <div class="slider-text-inner js-fullheight">
                                <div class="desc">
                                    <p><span>KHÁCH SẠN VTC</span></p>
                                    <h2>Chào mừng bạn đến với khách sạn VTC</h2>
                                    <p>
                                        <a href="{{ route('booking') }}" class="btn btn-primary btn-lg">ĐẶT PHÒNG NGAY</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url({{ url('upload/slide/222.jpg') }});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-12 col-md-offset-0 text-center slider-text">
                            <div class="slider-text-inner js-fullheight">
                                <div class="desc">
                                    <p><span>LIỆN HỆ VỚI CHÚNG TÔI</span></p>
                                    <h2>Hãy liên hệ với chúng tôi, để được nhận những dịch vụ và ưu đãi tốt nhất
                                    </h2>
                                    <p>
                                        <a href="{{ route('booking') }}" class="btn btn-primary btn-lg">ĐẶT PHÒNG NGAY</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url({{ url('upload/slide/333.jpg') }});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-12 col-md-offset-0 text-center slider-text">
                            <div class="slider-text-inner js-fullheight">
                                <div class="desc">
                                    <p><span>VỀ CHÚNG TÔI</span></p>
                                    <h2>Tìm hiểU về chúng tôi để có chúng ta hiểu nhau hơn</h2>
                                    <p>
                                        <a href="{{ route('booking') }}" class="btn btn-primary btn-lg">ĐẶT PHÒNG NGAY</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </aside>
    <div class="wrap">
        <div class="container">
            <div class="row">
                <div id="availability">
                    <form action="{{route('cart.addIndextoCart')}}" method="GET" id="form1" autocomplete="off">
                        <div class="a-col">
                            <section>
                                <select class="form-control" id="select-loai-phong" name="loaiphong"
                                    style="color: #db4118; font-weight: 16px; font-weight: 700;"
                                    onchange="changeLoaiPhong(this.value)">
                                    <option value="" disabled selected>Chọn loại phòng</option>
                                    @foreach ($loaiphong as $lp)
                                        <option value="{{ $lp->id }}">{{ $lp->tenloaiphong }}</option>
                                    @endforeach
                                </select>
                            </section>
                        </div>
                        <div class="a-col">
                            <section>
                                <select class="form-control" id="select-phong" name="phong"
                                    style="color: #db4118; font-weight: 16px; font-weight: 700;">
                                    <option value="" disabled selected>Chọn phòng</option>
                                </select>
                            </section>
                        </div>
                        <div class="a-col alternate">
                            <div class="input-field">
                                <label for="date-start">Check In: </label>
                                <input type="text" name="startdate" class="form-control" id="date-start" />
                            </div>
                        </div>
                        <div class="a-col alternate">
                            <div class="input-field">
                                <label for="date-end">Check Out: </label>
                                <input type="text" name="enddate" class="form-control" id="date-end" />
                            </div>
                        </div>
                        <div class="a-col action">
                            <a href="javascript:;" onclick="document.getElementById('form1').submit();">
                                <span>Đặt phòng</span>
                                Ngay bây giờ
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="fh5co-counter-section" class="fh5co-counters">
        <div class="container" style="padding-top: 5rem;">
            <div class="row">
                <div class="col-md-3 text-center">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="2035" data-speed="5"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Người sử dụng</span>
                </div>
                <div class="col-md-3 text-center">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="155" data-speed="5"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Phòng</span>
                </div>
                <div class="col-md-3 text-center">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="820" data-speed="5"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Giao dịch</span>
                </div>
                <div class="col-md-3 text-center">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="876" data-speed="5"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Đánh giá &amp; Cảm nhận</span>
                </div>
            </div>
        </div>
    </div>

    <div id="featured-hotel" class="fh5co-bg-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>DANH SÁCH PHÒNG</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($phong1 as $p1)
                    <div class="feature-full-1col">
                        <div class="image" style="background-image: url({{ url('upload/phong/' . $p1->hinhanh) }});">
                            <div class="descrip text-center">
                                <p><small>Giá</small><span>{{ number_format($p1->gia) }} VNĐ</span></p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3>{{ $p1->tenphong }}</h3>
                            <h4><i>{{ $p1->loaiphong->tenloaiphong }}</i></h4>
                            <p>{{ $p1->chuthich }}</p>
                            <p><a href="{{ route('cart.addCart', ['id' => $p1->id]) }}"
                                    class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>
                        </div>
                    </div>
                @endforeach

                <div class="feature-full-2col">
                    @foreach ($phong2 as $p2)
                        <div class="f-hotel">
                            <div class="image" style="background-image: url({{ url('upload/phong/' . $p2->hinhanh) }});">
                                <div class="descrip text-center">
                                    <p><small>Giá</small><span>{{ number_format($p2->gia) }} VNĐ</span></p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3>{{ $p2->tenphong }}</h3>
                                <h4><i>{{ $p2->loaiphong->tenloaiphong }}</i></h4>
                                <p>{{ $p2->chuthich }}</p>
                                <p><a href="{{ route('cart.addCart', ['id' => $p2->id]) }}"
                                        class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="feature-full-2col">
                    @foreach ($phong3 as $p3)
                        <div class="f-hotel">
                            <div class="image" style="background-image: url({{ url('upload/phong/' . $p3->hinhanh) }});">
                                <div class="descrip text-center">
                                    <p><small>Giá</small><span>{{ number_format($p3->gia) }} VNĐ</span></p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3>{{ $p3->tenphong }}</h3>
                                <h4><i>{{ $p3->loaiphong->tenloaiphong }}</i></h4>
                                <p>{{ $p3->chuthich }}</p>
                                <p><a href="{{ route('cart.addCart', ['id' => $p3->id]) }}"
                                        class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="section text-center">
                            <a href="{{route('booking')}}" class="btn btn-primary btn-lg">XEM THÊM...</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="hotel-facilities">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>DỊCH VỤ KHÁCH SẠN</h2>
                    </div>
                </div>
            </div>

            <div id="tabs">
                <nav class="tabs-nav">
                    <a href="#" class="active" data-tab="tab1">
                        <i class="flaticon-restaurant icon"></i>
                        <span>NHÀ HÀNG</span>
                    </a>
                    <a href="#" data-tab="tab2">
                        <i class="flaticon-cup icon"></i>
                        <span>Bar</span>
                    </a>
                    <a href="#" data-tab="tab3">
                        <i class="flaticon-car icon"></i>
                        <span>ĐƯA ĐÓN</span>
                    </a>
                    <a href="#" data-tab="tab4">
                        <i class="flaticon-swimming icon"></i>
                        <span>BỂ BƠI</span>
                    </a>
                    <a href="#" data-tab="tab5">
                        <i class="flaticon-massage icon"></i>
                        <span>SPA</span>
                    </a>
                    <a href="#" data-tab="tab6">
                        <i class="flaticon-bicycle icon"></i>
                        <span>GYM</span>
                    </a>
                </nav>
                <div class="tab-content-container">
                    <div class="tab-content active show" data-tab-content="tab1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('upload/page/restaurant.jpg') }}" class="img-responsive img2"
                                        alt="Image">
                                </div>
                                <div class="col-md-6">
                                    <span class="super-heading-sm">Đẳng cấp thể giới</span>
                                    <h3 class="heading">NHÀ HÀNG</h3>
                                    <p>Không gian rộng rãi, sang trọng, lịch lãm, nội thất, ánh sáng decor ấn
                                        tượng là một trong số các nhà hàng hải sản nổi tiếng Hà Nội, góp phần
                                        vào sự phát triển của Văn hóa ẩm thực Hà Thành, với vô số các loại hải
                                        sản tươi sống cao cấp , ngon lành mà giá rất hợp lý từ tôm, cua, ghẹ, ốc
                                        biển, sò huyết , Tù hài Canada , Bào ngư Nhật , Cá mú xanh ...</p>
                                    <p>Đặc biệt nổi tiếng các món ăn được chế biến từ 80% Tôm Hùm và Sashimi –
                                        tinh hoa văn hóa ẩm thực Nhật Bản, cùng đội ngũ đầu bếp, nhân viên
                                        chuyên nghiệp.</p>
                                    <p class="service-hour">
                                        <span>Giở mở cửa</span>
                                        <strong>7:30 AM - 8:00 PM</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" data-tab-content="tab2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('upload/page/bar.jpg') }}" class="img-responsive img2" alt="Image">
                                </div>
                                <div class="col-md-6">
                                    <span class="super-heading-sm">Đẳng cấp thể giới</span>
                                    <h3 class="heading">BARS</h3>
                                    <p>Bar VTC có phong cách thiết kế hiện đại, dàn hệ thống âm thanh đẳng cấp
                                        quốc tế. Bạn có thể thỏa sức phiêu theo điệu nhạc cùng những ánh sáng
                                        lung linh huyền ảo. Mỗi tuần bar Hà Nội nổi tiếng nhất đều tổ chức các
                                        sự kiện. Trong đó có sự góp mặt của nhiều ca sĩ, DJ nổi tiếng nên thu
                                        hút rất đông lượng khách. Đội ngũ nhân viên phục vụ khá tận tình, chu
                                        đáo.</p>
                                    <p>Đến bar VTC nổi tiếng nhất Hà Nội, bạn sẽ có dịp thưởng thức nhiều loại
                                        thức uống với mùi vị độc đáo.</p>
                                    <p class="service-hour">
                                        <span>Giở mở cửa</span>
                                        <strong>7:30 AM - 8:00 PM</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" data-tab-content="tab3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('upload/page/pickup.jpg') }}" class="img-responsive img2" alt="Image">
                                </div>
                                <div class="col-md-6">
                                    <span class="super-heading-sm">Đẳng cấp thể giới</span>
                                    <h3 class="heading">ĐƯA ĐÓN</h3>
                                    <p>Khách sạn VTC cung cấp một đội xe cao cấp trong suốt thời gian Quý khách
                                        lưu trú tại Hà Nội, bao gồm đưa đón tại sân bay quốc tế Nội Bài, phương
                                        tiện vận chuyển hàng ngày.</p>
                                    <p>Sử dụng dịch vụ đưa đón khách tại sân bay của chúng tôi để tránh mọi lừa
                                        đảo có thể xảy ra dọc đường từ sân bay đến khách sạn với mức giá hợp lý.
                                    </p>
                                    <p class="service-hour">
                                        <span>Giở mở cửa</span>
                                        <strong>7:30 AM - 8:00 PM</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" data-tab-content="tab4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('upload/page/swimming.jpg') }}" class="img-responsive img2"
                                        alt="Image">
                                </div>
                                <div class="col-md-6">
                                    <span class="super-heading-sm">Đẳng cấp thể giới</span>
                                    <h3 class="heading">BỂ BƠI</h3>
                                    <p>Bể bơi VTC là khu bể bơi ở Hà Nội hàng đầu, luôn được đông đảo các vị
                                        khách Hà thành ghé thăm. Đây là bể bơi vô cùng độc đáo với khả năng xoay
                                        chuyển nhiệt độ nước phù hợp với điều kiện thời tiết. Cái tên bể bơi bốn
                                        mùa cũng bắt nguồn từ đây. Ở Ciputra, nguồn nước được kiểm định kỹ càng,
                                        đặt chuẩn so với tiêu chuẩn quốc tế. Nằm nép mình trong khu đô thị rộng
                                        lớn, bể bơi bốn mùa Ciputra vẫn sở hữu không gian cực kỳ thoáng đãng.
                                    </p>
                                    <p>Cây xanh được trồng bao bọc xung quanh bể bơi. Khu vực cũng chuẩn bị sẵn
                                        ghế nghỉ ngơi vào ô che nắng cho các vị khách.</p>
                                    <p class="service-hour">
                                        <span>Giở mở cửa</span>
                                        <strong>7:30 AM - 8:00 PM</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" data-tab-content="tab5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('upload/page/spa.jpg') }}" class="img-responsive img2" alt="Image">
                                </div>
                                <div class="col-md-6">
                                    <span class="super-heading-sm">Đẳng cấp thể giới</span>
                                    <h3 class="heading">Spa</h3>
                                    <p>VTC Spa sẵn sàng làm bạn ngạc nhiên với sự chăm sóc tỉ mỉ từ những chi
                                        tiết nhỏ nhất, sự sạch sẽ tuyệt đối và dịch vụ bất ngờ.</p>
                                    <p>Điều khiến chúng tôi tự hào không chỉ là sự gia tăng về số lượng khách
                                        hàng, danh tiếng, doanh thu và sự hoàn thiện hơn về quy trình và chất
                                        lượng dịch vụ mà chính là sự gắn bó và nhiệt huyết sâu sắc. Chúng tôi
                                        tin rằng dịch vụ "hạnh phúc" chỉ đến từ những người hạnh phúc. Do đó,
                                        quan tâm đến nhân viên là một trong những giá trị cốt lõi của VTC Spa.
                                    </p>
                                    <p class="service-hour">
                                        <span>Giờ mở cửa</span>
                                        <strong>7:30 AM - 8:00 PM</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" data-tab-content="tab6">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('upload/page/gym.jpg') }}" class="img-responsive img2" alt="Image">
                                </div>
                                <div class="col-md-6">
                                    <span class="super-heading-sm">Đẳng cấp thể giới</span>
                                    <h3 class="heading">Gym</h3>
                                    <p>VTC Gym - Một cái tên không thể bỏ qua khi nhắc tới những phòng tập gym
                                        cao cấp Hà Nội. Với câu slogan độc đáo: “Hãy để Fitness World biến những
                                        giọt mồ của bạn không còn lãng phí trên phòng tập”, VTC Gym đã và đang
                                        làm được điều đó. Với quy mô rộng lớn, phòng tập được trang bị đầy đủ từ
                                        cơ sở vật chất, dụng cụ tập luyện. Máy móc đều được nhập khẩu từ Mỹ theo
                                        tiêu chuẩn 5 sao.</p>
                                    <p>Các hội viên khi tới đây luyện tập, đều được tư vấn kỹ lưỡng về thực đơn,
                                        lộ trình tập theo giáo án nổi tiếng LesMills. Đội ngũ nhân viên được đào
                                        tạo bài bản, chuyên nghiệp, bạn không còn phải lo lắng về từng kỹ thuật
                                        động tác của mình.</p>
                                    <p class="service-hour">
                                        <span>Giờ mở cửa</span>
                                        <strong>7:30 AM - 8:00 PM</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Phản hổi người dùng...</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimony">
                        <blockquote>
                            &ldquo;Dịch vụ thật tốt, tôi sẽ quay lại đây không chỉ 1, mà nhiều lần nữa!&rdquo;
                        </blockquote>
                        <p class="author"><cite>Cô Giang</cite></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimony">
                        <blockquote>
                            &ldquo;Một kì nghỉ thật vui vẻ. Nhân viên ở đây thật thân thiện...&rdquo;
                        </blockquote>
                        <p class="author"><cite>Cô Tú</cite></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimony">
                        <blockquote>
                            &ldquo;Gia đình tôi đã có những giây phút đầm ấm với nhau tại VTC&rdquo;
                        </blockquote>
                        <p class="author"><cite>Cô Linh</cite></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script language="javascript">

        function addIndextoCart() {
            $.ajax({
                url: 'booking-phong-id=' + $('#select-phong').val() + '&date-start=' +$('#date-start').val() + '&date-end=' + $('#date-end').val(),
                type: 'GET',
            }).done(function(response) {

            })
        }

        function getValue() {
            var i = $('#date-start').val();
            alert(i)
        }

        function changeLoaiPhong(id) {
            $.ajax({
                url: 'ajax/loaiphong/' + id,
                type: 'GET',
            }).done(function(response) {
                $("#select-phong").empty();
                $("#select-phong").html(response);
            })
        }

    </script>
@endsection
