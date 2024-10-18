<div class="container">
    @if (Session::has('Cart') != null)
        <div class="table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên Phòng</th>
                        <th scope="col">Loại Phòng</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach (Session::get('Cart')->phong as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td> <img src="{{ url('/upload/phong/' . $item['phongInfo']->hinhanh) }}" width="200px"
                                    height="100px" alt="Hình ảnh phòng"></td>
                            <td> {{ $item['phongInfo']->tenphong }}</td>
                            <td> {{ $item['phongInfo']->loaiphong->tenloaiphong }}</td>
                            <td>{{ $item['soluong'] }}</td>
                            <td>{{ number_format($item['phongInfo']->gia) }}</td>
                            <td class="delete"><i class="fa fa-remove" id="remove-item"
                                    data-id="{{ $item['phongInfo']->id }}" style="font-size: 30px;"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="total" id="list-cart">
            <ul class="list-group">
                <li class="list-group-item active">THANH TOÁN</li>
                <li class="list-group-item">Tổng số lượng:
                    {{ number_format(Session::get('Cart')->tongSoluong) }}
                </li>
                <li class="list-group-item">Tổng tiền: {{ number_format(Session::get('Cart')->tongGia) }}</li>
                <li>
                    <a href="#" style="">CHECK OUT</a>
                </li>
            </ul>
        </div>
    @endif
</div>
