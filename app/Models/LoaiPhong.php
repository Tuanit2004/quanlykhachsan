<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model
{
    //
    protected $table = 'loaiphong';
    protected $filltable = [
        'id',
        'tenloaiphong',
        'slug',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function phong()
    {
        return $this->hasMany(Phong::class,'loaiphong_id');
    }



}
