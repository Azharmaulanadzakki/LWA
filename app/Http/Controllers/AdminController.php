<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mapel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $adminCount = User::where('role', 'admin')->count();
        $userCount  = User::where('role', 'user')->count();
        $mapelCount = Mapel::count();

        return view('admin.dashboard', [
            'adminCount' => $adminCount,
            'userCount'  => $userCount,
            'mapelCount' => $mapelCount,
        ]);
    }
    public function dashboard() {
        return view('admin.dashboard');
    }
}
