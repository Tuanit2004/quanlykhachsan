<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietDP;
use App\Models\DatPhong;
use App\Models\KhachHang;
use App\Models\Phong;
use App\Models\LoaiPhong;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AjaxConTroller extends Controller
{
    public function getPhong($loaiphong_id)
    {
        $phong = Phong::where('loaiphong_id',$loaiphong_id)->get();
        foreach($phong as $p)
        {
            echo "<option value='".$p->id."'>".$p->tenphong."</option>";
        }
    }

    public function getDatPhong($id)
    {
        $datphong = DatPhong::find($id);
        $viewData = [
            'datphong' => $datphong,
        ];

        return view('admin.ajax.chitietdatphong', $viewData);
    }

    public function getLoaiPhong($id) {
        $phong = Phong::where('loaiphong_id', $id)->get();
        echo "<option value='' disabled selected>Chọn phòng</option>";
        foreach($phong as $p) {
            echo "<option value='".$p->id."'>".$p->tenphong."</option>";
        }
    }

    public function getBookingLoaiPhong($id) {
        if ($id != "all") {
            $phong = Phong::where('loaiphong_id', $id)->get();
            $viewData = [
                'phong' => $phong,
            ];
        } else {
            $phong = Phong::orderBy('loaiphong_id','DESc')->get();
            $viewData = [
                'phong' => $phong,
            ];
        }
        return view('admin.ajax.booking_loaiphong', $viewData);
    }

}
