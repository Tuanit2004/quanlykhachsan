@extends('layouts.index')
@section('css')
    <style>
        .container2 {
            display: flex;
            justify-content: space-between;
            align-items: center width: 100%;
        }

        .total {
            margin-left: 20px;
            width: 400px;
        }

        #content-booking,
        .list-view {
            margin-left: 5rem;
            margin-right: 5rem;
        }

        .header-fixed tbody,
        .header-fixed thead {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .header-fixed tr {
            -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .header-fixed th,
        .header-fixed td {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            text-align: center;
        }

        .header-fixed tbody {
            height: 400px;
            overflow-y: auto;
        }

        .header-fixed thead {
            padding-right: 15px;
        }

    </style>
@endsection
@section('content')

    <!-- end:fh5co-header -->
    <div class="fh5co-parallax" style="background-image: url({{ url('upload/slide/333.jpg') }});"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div
                    class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                    <div class="fh5co-intro fh5co-table-cell">
                        <h1 class="text-center">DANH SÁCH ĐẶT PHÒNG CỦA BẠN</h1>
                        <p>Cảm ơn bạn đã tin tưởng đồng hành cùng chúng tôi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('payment')}}" id="form2" method="GET">
        <div class="wrap">
            <div class="container">
                <div class="row">
                    <div id="availability">
                        <form action="#" autocomplete="off">
                            <div class="a-col alternate" style="margin: auto;">
                                <i class="fa fa-calendar" style="font-size: 20px; color: white;"></i>
                                <span style="color: white">CHỌN NGÀY ĐẾN VÀ ĐI: </span>
                            </div>
                            <div class="a-col alternate">
                                <div class="input-field" id="test1">
                                    <label for="date-start">Check In: </label>
                                    <input type="date" class="form-control" id="date-star" name="startdate"
                                        value="{{ date('Y-d-m') }}" onchange="updateDateStart()" />
                                </div>
                            </div>
                            <div class="a-col alternate">
                                <div class="input-field">
                                    <label for="date-end">Check Out: </label>
                                    <input type="date" class="form-control" id="date-ed" name="enddate"
                                        value="{{ date('Y-d-m') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="content-booking">
            <div class="row">
                <div class="col-md-12">
                    <div class="section text-center">
                        <h4>DANH SACH PHÒNG ĐÃ ĐẶT</h4>
                    </div>
                </div>
            </div>
            <div class="container2">
                <div class="table">
                    <table class="table header-fixed">
                        <thead>
                            <tr>
                                <th scope="col" class="col-3">Hình ảnh</th>
                                <th scope="col" class="col-3">Tên Phòng</th>
                                <th scope="col" class="col-3">Loại Phòng</th>
                                <th scope="col" class="col-3">Số lượng</th>
                                <th scope="col" class="col-3">Giá</th>
                                <th scope="col" class="col-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Session::has('Cart') != null)

                                @foreach (Session::get('Cart')->phong as $item)
                                    <tr>
                                        <td class="col-3"> <img
                                                src="{{ url('/upload/phong/' . $item['phongInfo']->hinhanh) }}"
                                                width="150px" height="100px" alt="Hình ảnh phòng"></td>
                                        <td class="col-3"> {{ $item['phongInfo']->tenphong }}</td>
                                        <td class="col-3"> {{ $item['phongInfo']->loaiphong->tenloaiphong }}</td>
                                        <td class="col-3">
                                            <select name="soluong" id="select-{{ $item['phongInfo']->id }}"
                                                data-idselect="{{ $item['phongInfo']->id }}"
                                                onchange="updateItemCart({{ $item['phongInfo']->id }})">
                                                @for ($i = 1; $i <= $item['phongInfo']->soluong; $i++)
                                                    <option value="{{ $i }}" @if ($i == $item['soluong'])
                                                        selected
                                                @endif
                                                >{{ $i }} phòng</option>
                                @endfor
                                </select>
                                </td>
                                <td class="col-3">{{ number_format($item['phongInfo']->gia) }}</td>
                                <td class="col-3"><i class="fa fa-remove"
                                        onclick="deleteItemCart({{ $item['phongInfo']->id }})"
                                        style="font-size: 30px; cursor: pointer; color: #FF5722;"></i>
                                </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="7">
                                    Bạn chưa đặt phòng nào!
                                </th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="total" id="list-cart">
                    <ul class="list-group">
                        <li class="list-group-item active">THANH TOÁN</li>
                        <li class="list-group-item">Tổng số lượng:
                            @if (isset(Session::get('Cart')->tongSoluong))
                                {{ number_format(Session::get('Cart')->tongSoluong) }} phòng
                            @else
                                0 phòng
                            @endif
                        </li>
                        <li class="list-group-item">Tổng tiền:
                            @if (isset(Session::get('Cart')->tongGia))
                                {{ number_format(Session::get('Cart')->tongGia) }} VNĐ
                            @else
                                0 VNĐ
                            @endif
                        </li>
                        <li>
                            <a href="javascript:;" onclick="document.getElementById('form2').submit();"class="btn btn-primary btn-lg btn-block">CHECK OUT</a>
                            {{-- <button type="button"
                                class="btn btn-primary btn-lg btn-block">CHECK OUT</button> --}}
                        </li>
                    </ul>
                </div>
            </div>
    </form>

    </div>
    <div class="container" style="margin-bottom: 5rem;">
        <div class="row">
            <div class="col-md-12">
                <div class="section text-center">
                    <a href="{{ route('booking') }}" class="btn btn-primary btn-lg">XEM DANH SÁCH CÁC PHÒNG</a>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')

    <script>
        function deleteItemCart(id) {
            $.ajax({
                url: 'cart/delete-cart/' + id,
                type: 'GET',
            }).done(function(response) {
                $("#content-booking").empty();
                $("#content-booking").html(response);
            })
        }

        function updateItemCart(id) {
            var value = $("#select-" + id).val();
            $.ajax({
                url: 'cart/update-cart/' + id + '/' + value,
                type: 'GET',
            }).done(function(response) {
                $("#content-booking").empty();
                $("#content-booking").html(response);
            })
        }

        function changeLoaiPhong(id) {
            $.ajax({
                url: 'ajax/booking/loaiphong/' + id,
                type: 'GET',
            }).done(function(response) {
                $("#list-phong").empty();
                $("#list-phong").html(response);
            })
        }

        function addCartBooking(id) {
            $.ajax({
                url: 'cart/add-cart-booking/' + id,
                type: 'GET',
            }).done(function(respone) {
                $("#content-booking").empty();
                $("#content-booking").html(response);
            })
        }

    </script>

@endsection
