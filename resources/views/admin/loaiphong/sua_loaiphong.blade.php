@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Loại phòng</h1>
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
    <div class="panel panel-default">
        <div class="panel-heading">
            Sửa loại phòng: {{ $loaiphong->ten }}
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.loaiphong.postSua', ['id' => $loaiphong->id]) }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <input type="hidden" name="user_id" value="1">
                    <label for="exampleFormControlInput1">Tên Loại phòng</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Loại phòng"
                        name="tenloaiphong" value="{{ $loaiphong->tenloaiphong }}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Sửa</button>
            </form>
        </div>
    </div>

@endsection
