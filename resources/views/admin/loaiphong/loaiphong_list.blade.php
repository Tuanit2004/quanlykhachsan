@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Loại phòng</h1>
        </div>
    </div>

    <!-- Thêm button thêm mới -->
    <div class="panel-body">
        <form method="GET" action="{{ route('admin.loaiphong.getThem') }}">
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

    <!-- Danh sách loại phòng -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Danh sách loại phòng</strong>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dtBasicExample">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Loại phòng</th>
                            <th>Tên loại phòng</th>
                            <th>Người thêm</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($loaiphong))
                            @foreach ($loaiphong as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tenloaiphong }}</td>
                                    <td>{{ $item->users->name }}</td>

                                    <!-- Chức năng sửa và xoá -->
                                    <td>
                                        <a href="{{ route('admin.loaiphong.getSua', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i> Sửa
                                        </a>
                                        <a href="{{ route('admin.loaiphong.getXoa', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" onclick="return ConfirmDelete()">
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
            return confirm('Bạn có chắc chắn muốn xoá loại phòng này không?');
        }
    </script>
@endsection
