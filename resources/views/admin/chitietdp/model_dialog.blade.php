@extends('admin.chitietdp.chitietdp_list')
@section('modal')
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chi tiết đặt phòng</h4>
            </div>
            <div class="modal-body">
                {{-- content
                --}}

                <div class="panel-body">    
                    <div class="table-responsive">
                        <p>Mã đặt phòng: <i style="color: rgb(241, 78, 78)">{{$datphong->id}}</i></p>
                        <p>Người đặt: <i style="color: rgb(241, 78, 78)">{{ $datphong->kh->ten_kh }}</i></p>
                        <p>Số điện thoại: <i style="color: rgb(241, 78, 78)">{{ $datphong->kh->sdt }}</i></p>
                        <p>Email: <i style="color: rgb(241, 78, 78)">{{ $datphong->kh->email }}</i></p>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table
                            class="table table-striped table-bordered table-hover"
                            id="dtBasicExample">
                            <thead>
                                <tr>
                                    <th>Ngày check in</th>
                                    <th>Ngày check out</th>
                                    <th>Tên phòng</th>
                                    <th>Loại Phòng</th>
                                    <th>Số phòng</th>
                                    <th>Số người</th>
                                    <th>Chú thích</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datphong->chitietdp as $ctdp)
                                    <tr>
                                        @if (isset($ctdp->datphong->start_date))
                                            <td>{{ $ctdp->datphong->start_date }}
                                            </td>
                                        @else
                                            <td><i style="color: red;"> --</i></td>
                                        @endif

                                        @if (isset($ctdp->datphong->end_date))
                                            <td>{{ $ctdp->datphong->end_date }}</td>
                                        @else
                                            <td><i style="color: red;"> --</i></td>
                                        @endif

                                        @if (isset($ctdp->phong->loaiphong->tenloaiphong))
                                            <td>{{ $ctdp->phong->loaiphong->tenloaiphong }}
                                            </td>
                                        @else
                                            <td><i style="color: red;"> --</i></td>
                                        @endif

                                        @if (isset($ctdp->phong->tenphong))
                                            <td>{{ $ctdp->phong->tenphong }}</td>
                                        @else
                                            <td><i style="color: red;"> --</i></td>
                                        @endif
                                        <td>{{ $ctdp->sophong }}</td>
                                        <td> {{ $ctdp->songuoi }}</td>
                                        <td>{{ $ctdp->chuthich }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection