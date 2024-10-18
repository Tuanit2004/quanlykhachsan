<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap', [\App\Http\Controllers\UserController::class, 'getLoginAdmin'])->name('admin.dangnhap');
Route::post('admin/dangnhap', [\App\Http\Controllers\UserController::class, 'postLoginAdmin'])->name('admin.login');
Route::get('admin/logout', [\App\Http\Controllers\UserController::class, 'getLogoutAdmin'])->name('admin.logout');


Route::group(['prefix' => 'admin', 'middleware'=>'adminLogin'], function () {

    Route::get('/', function () {
        return view('admin.layouts.index');
    })->name('admin.index');

    Route::resource('customers', \App\Http\Controllers\CustomerController::class);


    Route::group(['prefix' => 'profile'], function () {
        Route::get('{id}', [\App\Http\Controllers\ProfileController::class, 'getProfile'])->name('admin.profile');

        Route::post('sua/{id}', [\App\Http\Controllers\ProfileController::class, 'postSua'])->name('admin.profile.postSua');
        Route::post('password/{id}', [\App\Http\Controllers\ProfileController::class, 'postPassword'])->name('admin.profile.postPassword');
    });

    Route::group(['prefix' => 'chitietdp'], function () {
        Route::get('danhsach', [\App\Http\Controllers\ChiTietDPConTroller::class, 'getDanhSach'])->name('admin.chitietdp.danhsach');

        Route::get('sua/{id}', [\App\Http\Controllers\ChiTietDPConTroller::class, 'getSua'])->name('admin.chitietdp.getSua');
        Route::post('sua/{id}', [\App\Http\Controllers\ChiTietDPConTroller::class, 'postSua'])->name('admin.chitietdp.postSua');

        Route::delete('xoa/{id}', [\App\Http\Controllers\ChiTietDPConTroller::class, 'delete'])->name('admin.chitietdp.xoa');

        Route::get('xem/{id}', [\App\Http\Controllers\ChiTietDPConTroller::class, 'getXem'])->name('admin.chitietdp.getXem');

        Route::get('active/{id}', [\App\Http\Controllers\ChiTietDPConTroller::class, 'updateStatus']);
    });

    Route::group(['prefix' => 'loaiphong', 'middleware'=>'adminUser2'], function () {
        Route::get('danhsach', [\App\Http\Controllers\LoaiPhongController::class, 'getDanhSach'])->name('admin.loaiphong.danhsach');;

        Route::get('update', [\App\Http\Controllers\LoaiPhongController::class, 'getThem'])->name('admin.loaiphong.getThem');
        Route::post('update', [\App\Http\Controllers\LoaiPhongController::class, 'postThem'])->name('admin.loaiphong.postThem');

        Route::get('sua/{id}', [\App\Http\Controllers\LoaiPhongController::class, 'getSua'])->name('admin.loaiphong.getSua');
        Route::post('sua/{id}', [\App\Http\Controllers\LoaiPhongController::class, 'postSua'])->name('admin.loaiphong.postSua');

        Route::get('xoa/{id}', [\App\Http\Controllers\LoaiPhongController::class, 'getXoa'])->name('admin.loaiphong.getXoa');
    });

    Route::group(['prefix' => 'phong', 'middleware'=>'adminUser2'], function () {
        Route::get('danhsach', [\App\Http\Controllers\PhongController::class, 'getDanhSach'])->name('admin.phong.danhsach');;

        Route::get('update', [\App\Http\Controllers\PhongController::class, 'getThem'])->name('admin.phong.getThem');
        Route::post('update', [\App\Http\Controllers\PhongController::class, 'postThem'])->name('admin.phong.postThem');

        Route::get('sua/{id}', [\App\Http\Controllers\PhongController::class, 'getSua'])->name('admin.phong.getSua');
        Route::post('sua/{id}', [\App\Http\Controllers\PhongController::class, 'postSua'])->name('admin.phong.postSua');

        Route::get('xoa/{id}', [\App\Http\Controllers\PhongController::class, 'getXoa'])->name('admin.phong.getXoa');
    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaiphong/{id}',[\App\Http\Controllers\AjaxConTroller::class, 'getPhong'])->name('admin.ajax.getphong');

        Route::get('datphong/{id}',[\App\Http\Controllers\AjaxConTroller::class, 'getDatPhong'])->name('admin.ajax.getDatPhong');
    });

    Route::group(['prefix' => 'slide', 'middleware'=>'adminUser1'], function () {
        Route::get('danhsach', [\App\Http\Controllers\SlideMController::class, 'getDanhSach'])->name('admin.slide.danhsach');;

        Route::get('update',  [\App\Http\Controllers\SlideMController::class, 'getThem'])->name('admin.slide.getThem');
        Route::post('update',  [\App\Http\Controllers\SlideMController::class, 'postThem'])->name('admin.slide.postThem');

        Route::get('sua/{id}',  [\App\Http\Controllers\SlideMController::class, 'getSua'])->name('admin.slide.getSua');
        Route::post('sua/{id}',  [\App\Http\Controllers\SlideMController::class, 'postSua'])->name('admin.slide.postSua');

        Route::get('xoa/{id}',  [\App\Http\Controllers\SlideMController::class, 'getXoa'])->name('admin.slide.getXoa');
    });

    Route::group(['prefix' => 'user', 'middleware'=>'adminUser1'], function () {
        Route::get('danhsach', [\App\Http\Controllers\UserController::class, 'getDanhSach'])->name('admin.user.danhsach');;

        Route::get('update', [\App\Http\Controllers\UserController::class, 'getThem'])->name('admin.user.getThem');
        Route::post('update', [\App\Http\Controllers\UserController::class, 'postThem'])->name('admin.user.postThem');

        Route::get('sua/{id}', [\App\Http\Controllers\UserController::class, 'getSua'])->name('admin.user.getSua');
        Route::post('sua/{id}', [\App\Http\Controllers\UserController::class, 'postSua'])->name('admin.user.postSua');

        Route::get('xoa/{id}', [\App\Http\Controllers\UserController::class, 'getXoa'])->name('admin.user.getXoa');

        Route::post('resetpassword/{id}', [\App\Http\Controllers\UserController::class, 'postResetPassword'])->name('admin.user.postResetPassword');
    });
});

Route::get('/', [\App\Http\Controllers\IndexController::class, 'getIndex'])->name('website');

Route::get('booking', function () {
    return view('pages.booking');
})->name('booking');

Route::group(['prefix' => 'my-booking'], function () {
    Route::get('/', function () {
        return view('pages.mybooking');
    })->name('mybooking');

    Route::get('booking-to-cart', [\App\Http\Controllers\CartConTroller::class, 'addIndextoCart'])->name('cart.addIndextoCart');
});

Route::get('gioithieu', function () {
    return view('pages.gioithieu');
})->name('gioithieu');

Route::get('lienhe', function () {
    return view('pages.lienhe');
})->name('lienhe');



Route::group(['prefix' => 'payment', 'middleware'=>'payment'], function () {
    Route::get('/', [\App\Http\Controllers\PaymentController::class, 'getPayment'])->name('payment');
    Route::post('dat-phong', [\App\Http\Controllers\PaymentController::class, 'postPayment'])->name('payment.postPayment');
});
Route::get('thong-bao', [\App\Http\Controllers\PaymentController::class, 'getThongBao'])->name('getThongBao');

Route::get('cart/add-cart/{id}', [\App\Http\Controllers\CartConTroller::class, 'addCart'])->name('cart.addCart');
Route::get('cart/add-cart-booking/{id}', [\App\Http\Controllers\CartConTroller::class, 'addCart2'])->name('cart.addCart2');
Route::get('cart/delete-cart/{id}', [\App\Http\Controllers\CartConTroller::class, 'deleteCart'])->name('cart.deleteCart');
Route::get('cart', [\App\Http\Controllers\CartConTroller::class, 'getCart'])->name('cart');
Route::get('cart/update-cart/{id}/{quanty}', [\App\Http\Controllers\CartConTroller::class, 'updateCart'])->name('cart.updateCart');
Route::get('startdate', [\App\Http\Controllers\CartConTroller::class, 'updateDateStart'])->name('cart.updateDateStart');
Route::get('cart/update-date-end={end}', [\App\Http\Controllers\CartConTroller::class, 'updateDateEnd'])->name('cart.updateDateEnd');

Route::group(['prefix' => 'ajax'], function () {
    Route::get('loaiphong/{id}', [\App\Http\Controllers\AjaxConTroller::class, 'getLoaiPhong'])->name('ajax.getLoaiPhong');
    Route::get('booking/loaiphong/{id}', [\App\Http\Controllers\AjaxConTroller::class, 'getBookingLoaiPhong'])->name('ajax.getBookingLoaiPhong');

    Route::delete('admin/datphong/xoa/{id}', 'AdminController@xoaDatPhong')->name('admin.datphong.xoa');

});

