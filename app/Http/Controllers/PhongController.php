<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phong;
use App\Models\LoaiPhong;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PhongController extends Controller
{
    //
    public function getDanhSach()
    {
        $danhsach = Phong::all();

        $viewData = [
            'phong' => $danhsach

        ];
        return view('admin.phong.phong_list', $viewData);
    }

    public function getThem()
    {
        $danhsach = LoaiPhong::all();
        $viewData = [
            'loaiphong' => $danhsach

        ];
        return view('admin.phong.phong_add', $viewData);
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            "tenphong" => "required|min:5|max:50|unique:loaiphong,tenloaiphong"
        ], [
            "tenphong.required" => "Hãy nhập tên phòng",
            "tenphong.unique" => "Trùng tên phòng",
            "tenphong.min" => "Nhập tên phòng có độ dài > 5",
            "tenphong.max" => "Tên quá dài, hãy nhập lại"
        ]);

        $phong = new Phong;
        $phong->gia = $request->gia;
        $phong->slug = Str::slug($request->tenphong);
        $phong->tenphong = $request->tenphong;
        $phong->loaiphong_id = $request->loaiphong_id;
        $phong->soluong = $request->soluong;
        $phong->user_id = $request->user_id;
        $phong->chuthich = $request->chuthich;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect()->back()->with('loi', 'File ảnh tải lên không đúng định dạng!');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
            while (file_exists("upload/phong/" . $hinh)) {
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
            }
            $file->move("upload/phong", $hinh);
            $phong->hinhanh = $hinh;
        } else {
            $phong->hinhanh = "";
        }

        $phong->save();

        return redirect(route('admin.phong.danhsach'))->with('thongbao', 'Đã thêm thành công!');
    }

    public function getSua($id)
    {
        $phong = Phong::find($id);
        $loaiphong = LoaiPhong::all();

        return view('admin.phong.sua_phong', ['phong' => $phong, 'loaiphong' => $loaiphong]);
    }

    public function postSua(Request $request, $id)
    {
        $phong = Phong::find($id);

        $data = $request->except('_token');

        if ($request->tenphong != $phong->tenphong) {
            $messages = [
                'tenphong.required' => 'Hãy nhập tên loại phòng!',
                'tenphong.unique' => 'Trùng tên loại phòng',
                'tenphong.min' => 'Độ dài tên lớn hơn 5!',
                'tenphong.max' => 'Tên loại phòng quá dài!',
                'soluong.required' => 'Không được bỏ trống số lươngk'

            ];
            $validator = Validator::make($data, [
                'tenphong' => 'required|min:5|max:100|unique:phong,tenphong',
                'soluong' => 'required'
            ], $messages);
        } else {
            $messages = [
                'tenphong.required' => 'Hãy nhập tên loại phòng!',
                'tenphong.min' => 'Độ dài tên lớn hơn 5!',
                'tenphong.max' => 'Tên loại phòng quá dài!',
                'soluong.required' => 'Không được bỏ trống số lươngk'

            ];

            $validator = Validator::make($data, [
                'tenphong' => 'required|min:5|max:100',
                'soluong' => 'required'
            ], $messages);
        }


        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $phong->gia = $request->gia;
            $phong->slug = Str::slug($request->tenphong);
            $phong->tenphong = $request->tenphong;
            $phong->loaiphong_id = $request->loaiphong_id;
            $phong->soluong = $request->soluong;
            $phong->chuthich = $request->chuthich;
            if ($request->hasFile('hinhanh')) {
                if (File::exists(public_path('upload/phong/' . $phong->hinhanh))) {
                    File::delete(public_path('upload/phong/' . $phong->hinhanh));
                }
                $file = $request->file('hinhanh');
                $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                    return redirect()->back()->with('loi', 'File ảnh tải lên không đúng định dạng!');
                }
                $name = $file->getClientOriginalName();
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                while (file_exists("upload/phong/" . $hinh)) {
                    $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                }
                $file->move("upload/phong", $hinh);
                $phong->hinhanh = $hinh;
            }

            $phong->save();

            return redirect(route('admin.phong.danhsach'))->with('thongbao', 'Đã sửa thành công!');
        }
    }

    public function getXoa($id)
    {
        $phong = Phong::find($id);

        if (File::exists(public_path('upload/phong/' . $phong->hinhanh))) {
            File::delete(public_path('upload/phong/' . $phong->hinhanh));
        }

        $phong->delete();

        return redirect(route('admin.phong.danhsach'))->with('thongbao', 'XOÁ THÀNH CÔNG!');
    }
}
