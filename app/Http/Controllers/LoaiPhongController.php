<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhong;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoaiPhongController extends Controller
{
    //
    public function getDanhSach()
    {
        $danhsach = LoaiPhong::all();
        $viewData = [
            'loaiphong' => $danhsach

        ];
        return view('admin.loaiphong.loaiphong_list', $viewData);
    }

    public function getThem()
    {
        return view('admin.loaiphong.loaiphong_add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            "tenloaiphong" => "required|min:5|max:50|unique:loaiphong,tenloaiphong"
        ], [
            "tenloaiphong.required" => "Hãy nhập tên loại phòng",
            "tenloaiphong.unique" => "Trùng tên loại phòng",
            "tenloaiphong.min" => "Nhập tên loại phòng có độ dài > 5",
            "tenloaiphong.max" => "Tên quá dài, hãy nhập lại"
        ]);
        $loaiphong = new LoaiPhong;
        $loaiphong->slug = Str::slug($request->tenloaiphong);
        $loaiphong->tenloaiphong = $request->tenloaiphong;
        $loaiphong->user_id = $request->user_id;
        $loaiphong->save();
        return redirect()->back()->with('thongbao', 'Đã thêm thành công!');
    }

    public function getSua($id)
    {
        $loaiphong = LoaiPhong::find($id);
        return view('admin.loaiphong.sua_loaiphong', ['loaiphong' => $loaiphong]);
    }

    public function postSua(Request $request, $id)
    {
        $loaiphong = new LoaiPhong();
        $loaiphong = LoaiPhong::find($id);

        $data = $request->except('_token');

        $messages = [
            'tenloaiphong.required' => 'Hãy nhập tên loại phòng!',
            'tenloaiphong.unique' => 'Trùng tên loại phòng',
            'tenloaiphong.min' => 'Độ dài tên lớn hơn 5!',
            'tenloaiphong.max' => 'Tên loại phòng quá dài!'
        ];

        $validator = Validator::make($data, [
            'tenloaiphong' => 'required|min:5|max:100|unique:loaiphong,tenloaiphong'
        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $loaiphong->slug = Str::slug($request->tenloaiphong);
            $loaiphong->tenloaiphong = $request->tenloaiphong;
            $loaiphong->save();
            return redirect(route('admin.loaiphong.danhsach'))->with('thongbao', 'Sửa thành công loại phòng có ID: '.$id);
        }
    }

    public function getXoa($id)
    {
        $loaiphong = LoaiPhong::find($id);
        $loaiphong->delete();
        return redirect(route('admin.loaiphong.danhsach'))->with('thongbao', 'XOÁ THÀNH CÔNG!');
    }
}
