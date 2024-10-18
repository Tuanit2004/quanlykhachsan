<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatPhong extends Model
{
    use HasFactory;

    protected $table = 'datphong';

    protected $fillable = [
        'id',
        'khachhang_id',
        'user_id',
        'start_date',
        'end_date',
        'status'
    ];

    public function kh() {
        return $this->belongsTo(KhachHang::class,'khachhang_id');
    }

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function chitietdp()
    {
        return $this->hasMany(ChiTietDP::class,'datphong_id');
    }


}
