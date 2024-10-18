@extends('admin.layouts.index')

@section('content')

    <div class="col-lg-12" style=" padding: 10px; margin-bottom: 15px">
        <h1 class="page-header" style="">SỬA THÔNG TIN -
            <small> MÃ ĐƠN: {{ $chitietdp->id ?? 0 }} -</small>
            <small> MÃ ĐẶT PHÒNG: {{ $chitietdp->datphong_id ?? 0 }}</small>
        </h1>
        <hr>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif

    @if (session('thongbao'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session('thongbao') }}
        </div>
    @endif

    <form action="{{ route('admin.chitietdp.postSua', ['id' => $chitietdp->id ?? 0]) }}"
        style="margin-left: 100px; margin-right: 100px; padding-bottom: 200px" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên Khách đặt phòng</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nguyễn Văn A" name="Ten_kh"
                value="{{ optional($chitietdp->kh)->ten_kh }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Số điện thoại</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="0123456789" name="SDT"
                value="{{ optional($chitietdp->kh)->sdt }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email@email.com"
                name="Email" value="{{ optional($chitietdp->kh)->email }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ngày check in</label>
            <input style="width: 200px" type="date" class="form-control" id="exampleFormControlInput1" placeholder=""
                name="Start_date" value="{{ $chitietdp->start_date }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ngày check out</label>
            <input style="width: 200px" type="date" class="form-control" id="exampleFormControlInput1" placeholder=""
                name="End_date" value="{{ $chitietdp->end_date }}">
        </div>
        <!-- <div class="form-group">
            <label for="exampleFormControlSelect1">Loại phòng</label>
            <select style="width: 400px" class="form-control" id="loaiphong" name="LoaiPhong">
                @foreach ($loaiphong as $lp)
                    <option @if (isset($chitietdp->phong->loaiphong->id) and $chitietdp->phong->loaiphong->id == $lp->id)
                        {{ 'selected' }}
                @endif
                value="{{ $lp->id }}">{{ $lp->tenloaiphong }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Phòng</label>
            <select style="width: 400px" class="form-control" id="phong-select" name="Phong">
            </select>

        </div> -->
        <div class="form-group">
            <label for="exampleFormControlInput1">Số phòng</label>
            <input style="width: 200px" type="number" class="form-control" id="exampleFormControlInput1" placeholder=""
                name="Sophong" value="{{ $chitietdp->sophong }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Chú thích</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="Chuthich"
                value="{{ $chitietdp->chuthich }}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Sửa thông tin</button>
    </form>

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            var loaiphong_id = $("#loaiphong").val();
            var url = 'http://localhost/QuanLyKhachSan/public/admin/ajax/loaiphong/' + loaiphong_id
            // link = laroute.route('admin.chitietdp.getSua.{id}', {id : loaiphong_id})
            $.get(url, function(data) {
                $("#phong-select").html(data)
            })
            $("#loaiphong").change(function() {
                var loaiphong_id = $(this).val();
                // link = laroute.route('admin.chitietdp.getSua.{id}', {id : loaiphong_id})
                var url = 'http://localhost/QuanLyKhachSan/public/admin/ajax/loaiphong/' + loaiphong_id
                $.get(url, function(data) {
                    $("#phong-select").html(data)
                })
            });
        });

    </script>
@endsection
