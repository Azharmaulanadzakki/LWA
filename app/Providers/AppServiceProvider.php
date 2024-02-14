<?php

namespace App\Providers;

use App\Models\Mapel;
use App\Models\Package;
use App\Models\Tool;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
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
        // ambil data dari mapel controller agar bisa diakses di semua file
        $mapels = Mapel::all();
        view()->share('mapels', $mapels);

        $tools =Tool::all();
        view()->share('tools', $tools);
        
        $tools =Tool::all();
        view()->share('tools', $tools);

    }
}
