<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\SlideM;
use App\Http\Requests;

class PagesController extends Controller
{
    function __construct()
    {
        $slide = SlideM::all();
        view()->share('slide', $slide);
    }

}
