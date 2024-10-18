<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đã đặt phòng</title>
</head>
<body>
    <h1>thông tin xác nhận</h1>
    <p>Hế Lô {{ $khachhang->ten_kh }},</p>
    <p>bạn đã đặt phòng thành công. Sau đây là thông tin chi tiết:</p>
    <ul>
        <li> ID phòng : {{ $datphong->id }}</li>
        <li>Ngày nhận phòng : {{ $datphong->start_date }}</li>
        <li>Ngày trả phòng: {{ $datphong->end_date }}</li>
        <li>Tổng số phòng: {{ $datphong->tongsophong }}</li>
        <li>Tổng Tiền: {{ $datphong->tongtien }}</li>
        <li>ghi chú: {{ $datphong->chuthich }}</li>
    </ul>
    <p>cảm ơn đã sử sụng dụng vụ của khách sạn chúng tôi ^^ </p>
</body>
</html>
