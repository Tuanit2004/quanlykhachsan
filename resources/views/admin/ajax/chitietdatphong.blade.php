<style>
    .detail td {
        padding-right: 20px;
        padding-bottom: 10px;
        font-size: 16px;
    }

</style>
<div class="panel-body">
    <table class="detail">
        <tr>
            <td><span class="label label-default">Người đặt: </span></td>
            <td><i style="color: red"> {{ $datphong->kh->ten_kh }}</i></td>
        </tr>
        <tr>
            <td><span class="label label-default">Số điện thoại: </span></td>
            <td><i style="color: red"> {{ $datphong->kh->sdt }}</i></td>
        </tr>
        <tr>
            <td><span class="label label-default">Email: </span></td>
            <td><i style="color: red"> {{ $datphong->kh->email }}</i></td>
        </tr>
        <tr>
            <td><span class="label label-default">Địa chỉ: </span></td>
            <td><i style="color: red"> {{ $datphong->kh->diachi }}</i></td>
        </tr>
    </table>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTable " id="dtBasicExample">
            <thead>
                <tr>
                    <th>Tên phòng</th>
                    <th>Tên loại phòng</th>
                    <th>Số phòng</th>
                    <th>Giá 1 phòng</th>
                    <th>Ngày Checkin</th>
                    <th>Ngày Checkout</th>
                    <th>Chú thích</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datphong->chitietdp as $item)
                    <tr>
                        <th>{{ $item->phong->tenphong }}</th>
                        <th>{{ $item->phong->loaiphong->tenloaiphong }}</th>
                        <th>{{ $item->sophong }}</th>
                        <th>{{ number_format($item->phong->gia) }} VNĐ</th>
                        <th>{{ $datphong->start_date }}</th>
                        <th>{{ $datphong->end_date }}</th>
                        <th>{{ $item->chuthich }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
