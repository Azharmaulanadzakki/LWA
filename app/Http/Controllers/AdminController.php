<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mapel;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $adminCount = User::where('role', 'admin')->count();
        $userCount  = User::where('role', 'user')->count();
        $mapelCount = Mapel::count();
        $pendapatanSum = Pembayaran::where('status', 'success')->sum('harga');
        
        return view('admin.dashboard', [
            'adminCount' => $adminCount,
            'userCount'  => $userCount,
            'mapelCount' => $mapelCount,
            'pendapatanSum' => $pendapatanSum,
        ]);
    }
    public function dashboard() {
        return view('admin.dashboard');
    }
}
