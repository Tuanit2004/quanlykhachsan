@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Phòng</h1>
        </div>
    </div>

    <!-- Thêm button thêm mới -->
    <div class="panel-body">
        <form method="GET" action="{{ route('admin.phong.getThem') }}">
            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Thêm Mới</button>
        </form>
    </div>

    <!-- Hiển thị thông báo thành công -->
    @if (session('thongbao'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('thongbao') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Danh sách phòng -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Danh sách phòng</strong>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dtBasicExample">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>ID phòng</th>
                            <th>Tên phòng</th>
                            <th>Loại phòng</th>
                            <th>Tổng số phòng</th>
                            <th>Đã đặt</th>
                            <th>Giá (VNĐ)</th>
                            <th>Trạng thái</th>
                            <th>Chú thích</th>
                            <th>Hình ảnh</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($phong))
                            <?php $i = 1; ?>
                            @foreach ($phong as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><b style="color: red">{{ $item->id }}</b></td>
                                    <td>{{ $item->tenphong }}</td>
                                    
                                    @if (isset($item->loaiphong->tenloaiphong))
                                        <td>{{ $item->loaiphong->tenloaiphong }}</td>
                                    @else
                                        <td><i style="color: red">Không còn tồn tại</i></td>
                                    @endif

                                    <td>{{ $item->soluong }}</td>
                                    <td>{{ $item->booked }}</td>
                                    <td>{{ number_format($item->gia) }} VNĐ</td>

                                    @if ($item->soluong > 0)
                                        <td><span class="badge badge-success">Còn phòng</span></td>
                                    @else
                                        <td><span class="badge badge-danger">Hết phòng</span></td>
                                    @endif

                                    <td>{{ $item->chuthich }}</td>
                                    
                                    <td>
                                        @if ($item->hinhanh == '')
                                            <img width="200" height="100" src="{{ url('font-end/img/empty.jpg') }}" alt="No image" title="{{ $item->tenphong }}">
                                        @else
                                            <img width="200" height="100" src="{{ url('upload/phong/' . $item->hinhanh) }}" alt="{{ $item->tenphong }}" title="{{ $item->hinhanh }}">
                                        @endif
                                    </td>

                                    <!-- Chức năng sửa và xoá -->
                                    <td>
                                        <a href="{{ route('admin.phong.getSua', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i> Sửa
                                        </a>
                                        <a href="{{ route('admin.phong.getXoa', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" onclick="return ConfirmDelete()">
                                            <i class="fa fa-trash"></i> Xoá
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            // Kích hoạt DataTable
            $('#dtBasicExample').DataTable({
                "paging": true,
                "ordering": true,
                "info": false,
                "language": {
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "first": "Đầu",
                        "last": "Cuối",
                        "next": "Sau",
                        "previous": "Trước"
                    },
                    "zeroRecords": "Không tìm thấy kết quả phù hợp",
                    "infoEmpty": "Không có dữ liệu",
                }
            });
        });

        // Xác nhận trước khi xoá
        function ConfirmDelete() {
            return confirm('Bạn có chắc chắn muốn xoá phòng này không?');
        }
    </script>
@endsection
