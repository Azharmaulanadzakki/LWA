<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $faqs = FAQ::latest()->take(5)->get();
        $search = $request->input('search');
        $mapels = DB::table('mapels')
            ->when($search, function ($query) use ($search) {
                return $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate();

        return view('welcome', compact('mapels', 'search', 'faqs')); // Menambahkan 'faqs' ke dalam compact
    }
}
