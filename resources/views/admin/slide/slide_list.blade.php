@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slide</h1>
        </div>
    </div>
    <div class="panel-body">
        <form method="GET" action="{{ route('admin.slide.getThem') }}">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mớI</button>
        </form>
    </div>

    @if (session('thongbao'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('thongbao') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách slide
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dtBasicExample">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên slide</th>
                            <th>Hình</th>
                            <th>Nội dung</th>
                            <th>Link</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($slide))
                            <?php $i = 1; ?>
                            @foreach ($slide as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->ten }}</td>
                                    <td>
                                        @if ($item->hinh == '')
                                            <img width="500" height="200" src="{{ url('font-end/img/empty.jpg') }}" alt=""
                                                title="{{ $item->tenphong }}">
                                        @else
                                            <img width="500" height="200" src="{{ url('upload/slide/' . $item->hinh) }}"
                                                alt="" title="{{ $item->ten }}">
                                        @endif
                                    </td>
                                    <td>{{ $item->noidung }}</td>
                                    <td>{{ $item->link }}</td>
                                    <th><a href="{{ route('admin.slide.getSua', ['id' => $item->id]) }}">Sửa</a> | <a
                                            href="{{ route('admin.slide.getXoa', ['id' => $item->id]) }}"
                                            onclick="return ConfirmDelete()">Xoá</a></th>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
