@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Phòng</h1>
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
            Sửa phòng: {{ $phong->ten }}
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.phong.postSua', ['id' => $phong->id]) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <input type="hidden" name="user_id" value="1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Tên phòng</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên phòng"
                        name="tenphong" value="{{ $phong->tenphong }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Loại phòng</label>
                    <select style="width: 200px" class="form-control" id="loaiphong_id" name="loaiphong_id">
                        @foreach ($loaiphong as $lp)
                            <option @if (isset($phong->loaiphong->id) and $phong->loaiphong->id == $lp->id)
                                {{ 'selected' }}
                        @endif
                        value="{{ $lp->id }}">{{ $lp->tenloaiphong }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Số lượng</label>
                    <input style="width: 200px" type="number" class="form-control" id="exampleFormControlInput1"
                        placeholder="Số lượng" name="soluong" value="{{ $phong->soluong }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Giá</label> (VNĐ)
                    <input style="width: 200px" type="number" class="form-control" id="exampleFormControlInput1"
                        placeholder="Giá phòng" name="gia" value="{{ $phong->gia }}"> 
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Chú thích</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Chú thích"
                        name="chuthich" value="{{ $phong->chuthich }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Hình ảnh</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="hinhanh">

                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <span>Xem trước: </span>
                        <img id="blah" width="300px" height="300px">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Sửa</button>
            </form>
        </div>
    </div>

@endsection

@section('script')
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
