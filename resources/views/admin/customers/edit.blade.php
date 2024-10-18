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
            Sửa Customer: {{ $customer->name }}
        </div>
        <div class="panel-body">
            <form action="{{ url('admin/customers', ['id' => $customer->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full Name"
                        name="ten_kh" value="{{ $customer->ten_kh }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">SĐT</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone"
                           name="sdt" value="{{ $customer->sdt }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email"
                        value="{{ $customer->email }}" readonly="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address"
                           name="diachi" value="{{ $customer->diachi }}">
                </div>

                <button type="submit" class="btn btn-primary mb-2">Sửa</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>
            </form>
        </div>
    </div>

@endsection

@section('script')

@endsection
