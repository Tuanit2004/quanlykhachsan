@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slide</h1>
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
            Sửa: {{ $slide->ten }}
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.slide.postSua', ['id' => $slide->id]) }}" method="post"
                enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tên Slide</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên slide"
                            name="ten" value="{{ $slide->ten }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tiêu đề</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tiêu đề"
                            name="tieude" value="{{ $slide->tieude }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nội dung</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nội dung"
                            name="noidung" value="{{ $slide->noidung }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Link</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Link" name="link"
                            value="{{ $slide->link }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Hình ảnh</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="hinh">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Sửa</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('font-end/css/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputGroupFile01").change(function() {
            readURL(this);
        });

    </script>
@endsection
