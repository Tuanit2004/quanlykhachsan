@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đặt phòng</h1>
        </div>
    </div>

    @if (session('thongbao'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('thongbao') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách đặt phòng
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dtBasicExample">
                    <thead>
                    <tr>
                        <th>Mã đặt phòng</th>
                        <th>Người đặt</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt</th>
                        <th class="text-center">Trạng thái</th>
                        <th>Tổng tiền</th>
                        <th>Duyệt</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (isset($datphong))
                        @foreach ($datphong as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ optional($item->kh)->ten_kh }}</td>
                                <td>{{ optional($item->kh)->sdt }}</td>
                                <td>{{ optional($item->kh)->email }}</td>
                                <td>{{ optional($item->kh)->diachi }}</td>
                                <td>{{ $item->ngaydat }}</td>
                                <td class="text-center">
                                    <button type="button"
                                            class="btn btn-sm {{ ($item->status == 1) ? 'btn-success': 'btn-danger' }}">
                                        {!! ($item->status == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>': '<i class="fa fa-times" aria-hidden="true"></i>' !!}</button>
                                </td>
                                <td>{{ number_format($item->tongtien) }} VNĐ</td>
                                <td>
                                    <a class="btn btn-sm {{ ($item->status == 0) ? 'btn-success': 'btn-danger'}}"
                                       href="{{ url('admin/chitietdp/active?status='.$item->status, ['id' => $item->id]) }}">{{ ($item->status == 0) ? 'Duyệt': 'Huỷ' }}</a>
                                </td>
                                <td style="display: flex;flex-wrap: wrap; justify-content: center;">
                                    <a class="btn btn-sm btn-warning"
                                       href="{{ route('admin.chitietdp.getSua', ['id' => $item->id]) }}">Sửa</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <!-- Button Xem -->
                                    <button type="button" class="btn btn-sm btn-info btn-xem" data-toggle="modal"
                                            data-target="#myModal"
                                            id="btn-xem"
                                            data-url={{ route('admin.ajax.getDatPhong', ['id' => $item->id]) }}>Xem
                                    </button>
                                    &nbsp;
                                    <!-- Button Xóa -->
                                    &nbsp;&nbsp;
                                    <form action="{{ url('admin/chitietdp/xoa', ['id' => $item->id]) }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return ConfirmDelete()">
                                            Xoá
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Chi Tiết -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết đặt phòng</h4>
                </div>
                <div class="modal-body" id="modal-content-detail">
                    {{-- content --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xóa -->
    <div id="modalXoa" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận xóa</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa đặt phòng này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="confirm-delete">Xóa</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function ConfirmDelete() {
            return confirm('Bạn có chắc chắn muốn xoá đơn này không?');
        }
    </script>
    <script>
        $(document).ready(function () {
            var deleteId;

            // Khi click vào nút Xem
            $(".btn-xem").click(function (e) {
                var url = $(this).data('url');
                $.ajax({
                    type: 'get',
                    url: url,
                    dataType: 'html',
                    success: function (data) {
                        $('#modal-content-detail').html(data);
                    }
                })
            });

            // Khi click vào nút Xóa
            $(".btn-xoa").click(function () {
                deleteId = $(this).data('id');
            });

            // Khi xác nhận xóa
            $("#confirm-delete").click(function () {
                $.ajax({
                    url: '/admin/datphong/xoa/' + deleteId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}", // Bảo mật CSRF
                    },
                    success: function (response) {
                        alert(response.success);
                        location.reload(); // Tải lại trang sau khi xóa thành công
                    },
                    error: function (response) {
                        alert(response.error);
                    }
                });
                $('#modalXoa').modal('hide');
            });
        });
    </script>
@endsection
