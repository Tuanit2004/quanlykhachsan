<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietDP;
use App\Models\DatPhong;
use App\Models\KhachHang;
use App\Models\Phong;
use App\Models\LoaiPhong;
use App\Models\Cart;
use App\Models\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;

class CartConTroller extends Controller
{
    public function getCart() {
        return view('pages.cart');
    }

    public function addCart(Request $request, $id) {
        $phong = Phong::find($id);
        if ($phong != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($phong, $id);

            $request->session()->put('Cart', $newCart);
        }
        view('pages.cart', compact('newCart'));
        return redirect()->route('mybooking');
    }

    public function addCart2(Request $request, $id) {
        $phong = Phong::find($id);
        if ($phong != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($phong, $id);

            $request->session()->put('Cart', $newCart);
        }
        return redirect()->route('cart');
    }

    public function deleteCart(Request $request, $id) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);

        if(Count($newCart->phong) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }
        return redirect()->route('cart');
    }

    public function updateCart(Request $request, $id, $quanty) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quanty);

        $request->Session()->put('Cart', $newCart);

        return redirect()->route('cart');
    }

    public function addIndextoCart(Request $request) {
        $phong = Phong::find($request->phong);
        if ($phong != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($phong, $request->phong);

            $request->session()->put('Cart', $newCart);
        }
        $request->Session()->put('std', $request->startdate);
        $request->Session()->put('end', $request->enddate);

        return redirect()->route('mybooking');
    }

     public function updateDateStart(Request $request) {
        $a = $request->startdate;
        $request->Session()->put('std', $request->startdate);
        return redirect()->route('test')->with('a', $a);

    }

     public function updateDateEnd(Request $request, $end) {
        $oldDate = Session('Date') ? Session('Date') : null;
        $newDate = new Date($oldDate);
        $newDate->updateEnd($end);
        $request->Session()->put('Date', $end);
        return;
    }


}
