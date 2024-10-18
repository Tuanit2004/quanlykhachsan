<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    //
    protected $table = 'phong';
    protected $filltable = [
        'id',
        'loaiphong_id',
        'tenphong',
        'chuthich',
        'user_id',
        'soluong',
        'gia',
        'slug',
        'booked'
    ];

    public function loaiphong() {
        return $this->belongsTo(LoaiPhong::class,'loaiphong_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function chitietdp()
    {
        return $this->hasMany(ChiTietDP::class,'phong_id');
    }
}
