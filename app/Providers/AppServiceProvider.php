<?php

namespace App\Providers;

use App\Models\LoaiPhong;
use App\Models\Phong;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        view()->composer('pages.booking', function($view) {
            $loaiphong = LoaiPhong::all();
            $phong = Phong::orderBy('loaiphong_id','DESc')->get();
            $viewdata = [
                'loaiphong' => $loaiphong,
                'phong' => $phong,
            ];
            $view->with($viewdata);
        });

        view()->composer('pages.mybooking', function($view) {
            $loaiphong = LoaiPhong::all();
            $viewdata2 = [
                'loaiphong' => $loaiphong,
            ];
            $view->with($viewdata2);
        });
    }
}
