<?php

namespace App\Http\Controllers;

use App\Models\MapelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MycourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        $mapel = MapelUser::with('mapels')->where('user_id', $user->id)->get();
        // dd($mapel[1]->mapels->judul);

        return view('auth.mycourse.index', compact('mapel'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
