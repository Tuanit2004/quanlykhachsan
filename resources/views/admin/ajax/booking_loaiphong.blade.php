@if (isset($phong))
@foreach ($phong as $item)
    <div class="col-md-4">
        <div class="hotel-content">
            <div class="hotel-grid" style="background-image: url({{ url('upload/phong/' . $item->hinhanh) }});">
                <div class="price"><small>GIÁ</small><span>{{ number_format($item->gia) }} VNĐ</span></div>
                <a class="book-now text-center" href="{{ route('cart.addCart', ['id' => $item->id]) }}" onclick="addCartBooking($item->id)"
                    data-id="{{ $item->id }}"><i class="ti-calendar"></i> Book Now</a>
            </div>
            <div class="desc">
                <h3><a>{{ $item->tenphong }}</a></h3>
                <h4><i>{{ $item->loaiphong->tenloaiphong }}</i></h4>
                <p>{{ $item->chuthich }}</p>
            </div>
        </div>
    </div>
@endforeach
@endif



