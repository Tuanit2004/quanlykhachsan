<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function getProfile($id) {
        $danhsach = User::find($id);

        $viewData = [
            'user' => $danhsach

        ];
        return view('admin.user.profile', $viewData);
    }

    public function postSua(Request $request, $id) {
        $user = User::find($id);

        $user->name     = $request->name;
        $user->ngaysinh = $request->ngaysinh;
        $user->gioitinh = $request->gioitinh;
        $user->sdt = $request->sdt;
        $user->save();
        return redirect(route('admin.profile', ['id'=>$user->id]))->with('thongbao', 'SỬA THÀNH CÔNG!');
    }

    public function postPassword(Request $request, $id) {
        $user = User::find($id);
        if(!(Hash::check($request->password, $user->password))) {
    		return redirect(route('admin.profile', ['id'=>$user->id]))>with('loi', 'SỬA THÀNH CÔNG!');

    	} else if(strcmp($request->password, $request->newPassword) == 0){
    		return redirect(route('admin.profile', ['id'=>$user->id]))>with('loi', 'SỬA THÀNH CÔNG!');

    	}

    	//change password
    	$user->password = bcrypt($request->newPassword);
    	$user->save();

    	return redirect(route('admin.profile', ['id'=>$user->id]))>with('thongbao', 'SỬA THÀNH CÔNG!');
    }

}
