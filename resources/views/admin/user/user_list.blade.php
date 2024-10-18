@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User</h1>
        </div>
    </div>

    <!-- Thêm button thêm mới với style đẹp -->
    <div class="panel-body">
        <form method="GET" action="{{ route('admin.user.getThem') }}">
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

    <!-- Panel chứa danh sách user -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Danh sách user</strong>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dtBasicExample">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mã Nhân Viên</th>
                            <th>Chức vụ</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($user))
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->ma_nv }}</td>
                                    <td>{{ $item->role->role_name }}</td>
                                    <td>
                                        <!-- Sửa và Xoá với icon -->
                                        <a href="{{ route('admin.user.getSua', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i> Sửa
                                        </a>
                                        <a href="{{ route('admin.user.getXoa', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" onclick="return ConfirmDelete()">
                                            <i class="fa fa-trash"></i> Xoá
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">Không có dữ liệu</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Confirm delete script -->
    <script type="text/javascript">
        function ConfirmDelete() {
            return confirm('Bạn có chắc chắn muốn xoá người dùng này không?');
        }
    </script>

    <!-- Optional: DataTable script for table sorting and searching -->
    <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable({
                "paging": true,
                "ordering": true,
                "info": false
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
