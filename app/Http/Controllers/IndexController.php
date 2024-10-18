<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phong;
use App\Models\LoaiPhong;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function getIndex()
    {
        $loaiphong = LoaiPhong::all();
        $phong0 = Phong::where('soluong', '>', 0)->get();
        $phong1 = Phong::where('soluong', '>', 0)->limit(1)->get();
        $phong2 = Phong::where('soluong', '>', 0)->skip(1)->take(2)->get();
        $phong3 = Phong::where('soluong', '>', 0)->skip(3)->take(2)->get();

        $viewData = [
            'loaiphong' => $loaiphong,
            'phong1' => $phong1,
            'phong2' => $phong2,
            'phong3' => $phong3,
        ];
        return view('pages.index', $viewData);
    }


}
