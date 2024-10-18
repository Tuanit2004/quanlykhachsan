<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDP extends Model
{
    //
    protected $table = 'chitietdp';
    protected $filltable = [
        'id',
        'datphong_id',
        'phong_id',
        'sophong',
        'songuoi',
        'chuthich'
    ];

    public function datphong() {
        return $this->belongsTo(DatPhong::class,'datphong_id');
    }

    public function phong() {
        return $this->belongsTo(Phong::class,'phong_id');
    }

}
