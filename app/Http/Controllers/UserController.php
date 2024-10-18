<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function getDanhSach() {
        $danhsach = User::all();

        $viewData = [
            'user' => $danhsach
        ];
        return view('admin.user.user_list', $viewData);
    }

    public function getThem() {
        $danhsach = Role::all();

        $viewData = [
            'role' => $danhsach

        ];
        return view('admin.user.user_add', $viewData);
    }

    public function postThem(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:5|max:50',
            'email' => 'required',
            'password' => 'required',
            'ma_nv' => 'required|unique:users,ma_nv'

        ], [
            "name.required" => "Hãy nhập tên",
            "tenphong.min" => "Nhập tên có độ dài lớn hơn 5",
            "tenphong.max" => "Tên quá dài, hãy nhập lại",
            "email.required" => "Hãy nhập email",
            "password.required" => "Hãy nhập password",
            "ma_nv.required" => "Hãy nhập mã nhân viên",
            "ma_nv.unique" => "Trùng mã nhân viên"
        ]);

        $user = new User;
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->ma_nv = $request->ma_nv;

        $user->save();

        return redirect(route('admin.user.danhsach'))->with('thongbao', 'Đã thêm thành công User');
    }

    public function getSua($id) {
        $user = User::find($id);
        $role = Role::all();

        return view('admin.user.sua_user', ['user' => $user, 'role'=>$role]);

    }

    public function postSua(Request $request, $id) {
        $user = User::find($id);

        $data = $request->except('_token');

        $messages = [
            "name.required" => "Hãy nhập tên",
            "tenphong.min" => "Nhập tên có độ dài lớn hơn 5",
            "tenphong.max" => "Tên quá dài, hãy nhập lại",
            "email.required" => "Hãy nhập email",
            "ma_nv.required" => "Hãy nhập mã nhân viên"

        ];

        $validator = Validator::make($data,[
            'name' => 'required|min:5|max:50',
            'email' => 'required',
            'ma_nv' => 'required'
        ], $messages);

        if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	} else {

        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->ma_nv = $request->ma_nv;

        $user->save();

        return redirect(route('admin.user.danhsach'))->with('thongbao', 'SỬA THÀNH CÔNG!');
        }

    }

    public function getXoa($id) {
        $user = User::find($id);

        $user->delete();

        return redirect(route('admin.user.danhsach'))->with('thongbao', 'XOÁ THÀNH CÔNG: '.$user->name);

    }

    public function getLoginAdmin() {

            return view('layouts.dangnhap');

    }

    public function postLoginAdmin(Request $request) {
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required'=>'Bạn chưa nhập Usernane',
            'password.required'=>'Bạn chưa nhập Password'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('admin.index'));
        } else {
            return redirect()->back()->with('thongbao', 'Đăng nhập thất bại!');
        }
    }

    public function getLogoutAdmin() {
        Auth::logout();
        return redirect(route('admin.dangnhap'));
    }

    public function postResetPassword($id) {
        $user = User::find($id);

        $user->password = bcrypt("123456");

        return back()->with('thongbao', 'Đặt lại mật khẩu về mặc định thành công!');

    }

}
