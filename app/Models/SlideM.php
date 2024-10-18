<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideM extends Model
{
    //
    protected $table = 'slide';
    protected $filltable = [
        'id',
        'ten',
        'hinh',
        'tieude',
        'noidung',
        'link',
    ];
}
