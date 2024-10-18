<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = 'kh';

    protected $fillable = [
        'ten_kh',
        'sdt',
        'email',
        'diachi'
    ];

    public function datphong()
    {
        return $this->hasMany(KhachHang::class,'khachhang_id');
    }



}
