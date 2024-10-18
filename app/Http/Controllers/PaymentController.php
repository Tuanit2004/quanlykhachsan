<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietDP;
use App\Models\DatPhong;
use App\Models\KhachHang;
use App\Models\Phong;
use App\Models\LoaiPhong;
use App\Models\Cart;
use App\Models\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use Session;

class PaymentController extends Controller
{
    public function getPayment(Request $request) {
        $request->Session()->put('std', $request->startdate);
        $request->Session()->put('end', $request->enddate);
        return view('pages.payment');
    }

    public function getThongBao() {
        return view('pages.thongbao');
    }

    public function postPayment(Request $request) {

        $data = $request->except('_token');

        $messages = [
            "name.required" => "Hãy nhập đầy đủ họ tên.",
            "sdt.required" => "Hãy nhập đầy đủ họ tên.",
            "diachi.required" => "Hãy nhập email.",
            "name.min" => "Hãy nhập đầy đủ họ tên.",
            "name.max" => "Hãy nhập đầy đủ họ tên.",
        ];

        $validator = Validator::make($data,[
            "name" => "required|min:5|max:50",
            "sdt" => "required",
            "diachi" => "required",
        ], $messages);

        if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	} else {

            $kh = new KhachHang;
            $kh->ten_kh = $request->name;
            $kh->sdt = $request->sdt;
            $kh->email = $request->email;
            $kh->diachi = $request->diachi;
            $kh->save();


            $start_date = Session::get('std');
            $end_date = Session::get('end');

            $cart = Session::get('Cart');

            $datphong = new DatPhong;
            $datphong->khachhang_id = $kh->id;
            $datphong->ngaydat = date('Y-m-d');
            $datphong->tongsophong = $cart->tongSoluong;
            $datphong->tongtien = $cart->tongGia;
            $datphong->start_date = $start_date;
            $datphong->end_date = $end_date;
            $datphong->chuthich = $request->chuthich;
            $datphong->save();


            foreach ($cart->phong as $key => $value) {
                $chitietdp = new ChiTietDP;
                $chitietdp->datphong_id = $datphong->id;
                $chitietdp->phong_id = $key;
                $chitietdp->sophong = $value['soluong'];
                $chitietdp->gia = ($value['gia']/$value['soluong']);
                $chitietdp->save();

                $p = Phong::find($key);
                $p->soluong -= $value['soluong'];
                $p->booked += $value['soluong'];
                $p->save();

            }

            $request->session()->forget('Cart');
            $request->session()->forget('std');
            $request->session()->forget('end');

             // Send confirmation email
            Mail::to($kh->email)->send(new BookingConfirmation($datphong, $kh));

            return redirect(route('getThongBao'))->with('thongbao', 'BẠN ĐÃ ĐẶT PHÒNG THÀNH CÔNG');
        }
    }

}
