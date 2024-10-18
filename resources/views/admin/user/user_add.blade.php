@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User</h1>
        </div>
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

    @if (session('loi'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session('loi') }}
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Thêm User
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.user.postThem') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Chức vụ</label>
                    <select style="width: 200px" class="form-control" id="role_id" name="role_id">
                        @foreach ($role as $r)
                            @if ($r->id != 1)
                                <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name" value=""
                        autocomplete="off" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value=""
                        autocomplete="off" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password"
                        value="" required autocomplete="off" />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Xác nhận mật khẩu"
                        name="passwordAgain" value="" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Mã nhân viên</label>
                    <input type="text" class="form-control" id="manv" placeholder="Mã nhân viên" name="ma_nv" value="">
                </div>

                <button type="submit" class="btn btn-primary mb-2">Thêm</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Xác nhận mật khẩu không đúng!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

    </script>
@endsection
