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

class ChiTietDPConTroller extends Controller
{
    //
    public function getDanhSach()
    {
        $chitietdp = ChiTietDP::orderBy('id', 'DESc')->get();
        $datphong = DatPhong::orderBy('id', 'DESc')->get();

        $viewData = [
            'datphong' => $datphong,
            'chitietdp' => $chitietdp,
        ];

        return view('admin.chitietdp.chitietdp_list', $viewData);
    }


    public function getSua($id)
    {
        $chitietdp = DatPhong::find($id);
        $loaiphong = LoaiPhong::all();
        $phong = Phong::all();

        return view('admin.chitietdp.sua_ctdp', ['chitietdp' => $chitietdp, 'loaiphong' => $loaiphong, 'phong' => $phong]);
    }

    public function postSua(Request $request, $id)
    {
        $datphong = DatPhong::find($id);
        $chitietdp = ChiTietDP::where('datphong_id', $id)->first();
        $kh = KhachHang::find($datphong->khachhang_id);

        $data = $request->except('_token');

        $messages = [
            'Ten_kh.required' => 'Hãy nhập tên',
            'SDT.required' => 'Hãy nhập Số điện thoại',
            'Email.required' => 'Hãy nhập Email',
            'Start_date.required' => 'Hãy nhập Ngày Checkin',
            'End_date.required' => 'Hãy nhập Ngày Checkout',
            'LoaiPhong.required' => 'Hãy nhập Loại phòng',
            'Phong.required' => 'Hãy nhập Phòng',
            'Sophong.required' => 'Hãy nhập Số phòng'
        ];

        $validator = Validator::make($data, [
            'Ten_kh' => 'required',
            'SDT' => 'required',
            'Email' => 'required',
            // 'Start_date' => 'required',
            // 'End_date' => 'required',
            // 'LoaiPhong' => 'required',
            // 'Phong' => 'required',
            // 'Sophong' => 'required'
        ], $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $kh->ten_kh = $request->Ten_kh;
            $kh->sdt = $request->SDT;
            $kh->email = $request->Email;
            $datphong->start_date = $request->Start_date;
            $datphong->end_date = $request->End_date;

            //Update chi tiết
            
            // $chitietdp->phong_id = $request->Phong;
            // $chitietdp->sophong = $request->Sophong;
            // $chitietdp->chuthich = $request->Chuthich;

            // $chitietdp->save();
            $kh->save();
            $datphong->save();

            return redirect()->back()->with('thongbao', 'SỬA THÀNH CÔNG');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        DatPhong::destroy($id);
        //Xoá chi tiết
        \DB::table('chitietdp')->where('datphong_id', $id)->delete();

        return redirect('admin/chitietdp/danhsach')->with('thongbao', 'Xoá thành công!');
    }

    public function updateStatus($id, Request $request)
    {
        $active = ($request->status == 0) ? 1 : 0;

        $data = DatPhong::find($id);

        $data->update([
            'status' => $active
        ]);

        //Gửi mail về đặt hàng
        if($active == 1){
            $email = optional($data->kh)->email;

            $details = [
                'title' => 'Đặt phòng thành công',
                'body' => 'This is for testing email using smtp'
            ];
            \Mail::to($email)->send(new \App\Mail\MyTestMail($details));
        }

        $message = ($active == 1) ? 'Duyệt đơn thành công' : 'Huỷ đơn thành công';
        return redirect('admin/chitietdp/danhsach')->with('thongbao', $message);
    }
}
