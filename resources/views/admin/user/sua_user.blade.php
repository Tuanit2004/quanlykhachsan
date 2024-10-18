@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa User</h1>
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
            Sửa User: {{ $user->name }}
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.user.postSua', ['id' => $user->id]) }}" method="post"
                enctype="multipart/form-data">
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
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full Name"
                        name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email"
                        value="{{ $user->email }}" readonly="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Mã nhân viên</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mã nhân viên"
                        name="ma_nv" value="{{ $user->ma_nv }}">
                </div>

                <button type="submit" class="btn btn-primary mb-2">Sửa</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>
            </form>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Đặt lại mật khẩu
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.user.postResetPassword', ['id' => $user->id]) }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary mb-2" onclick="return ConfirmResetPass()">Đặt lại mật
                    khẩu</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function ConfirmResetPass() {
            var x = confirm("Bạn có muốn đặt lại mật khẩu?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
