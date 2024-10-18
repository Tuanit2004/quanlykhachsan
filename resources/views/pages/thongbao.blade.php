@extends('layouts.index')
@section('content')
    <div class="fh5co-parallax" style="background-image: url({{ url('upload/slide/333.jpg') }});"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div
                    class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                    <div class="fh5co-intro fh5co-table-cell">
                        @if (session('thongbao'))
                            <h1 class="text-center"> {{ session('thongbao') }}</h1>
                            <p>Cảm ơn bạn đã tin tưởng đồng hành cùng chúng tôi.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
