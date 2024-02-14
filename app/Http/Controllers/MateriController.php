<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $materis = Materi::with('mapel')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(5);

        foreach ($materis as $materi) {
            // Format 'created_at' dalam bahasa Inggris (US)
            $materi->formatted_created_at = Carbon::parse($materi->created_at)->translatedFormat('F Y');

                // // Periksa apakah properti playlist ada sebelum di-decode
                // $materi->playlist = isset($materi->playlist) ? json_decode($materi->playlist, true) : [];
        }

        // Set locale kembali ke default
        App::setLocale(config('app.locale'));

        return view('admin.materi.index', compact('materis', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Mapel::all();
        return view('admin.materi.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'     => 'required',
            'isi'       => 'required',
            'parent_id' => 'required|exists:mapels,id',
            'tautan'    => 'required|url',
        ]);

        // Create Materi without uploading gif
        $materi = Materi::create([
            'judul'     => $request->judul,
            'isi'       => $request->isi,
            'parent_id' => $request->parent_id,
            'tautan'    => $request->tautan,
        ]);

        // Update parent's 'active' status
        if ($request->input('parent_id')) {
            $activeParent = Mapel::find($request->input('parent_id'));
            if ($activeParent) {
                $activeParent->update(['active' => true]);
            }
        }

        return redirect()->route('materi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        return view('admin.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        $this->validate($request, [
            'judul'     => 'required',
            'isi'       => 'required',
            'tautan'    => 'required|url',
        ]);

        // Update Materi without changing gif
        $materi->update([
            'judul'     => $request->judul,
            'isi'       => $request->isi,
            'tautan'    => $request->tautan,
        ]);

        return redirect()->route('materi.index')->with(['success' => 'Data Berhasil di Update!']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        $materi->delete();
        Alert::success("Berhasil dihapus");
        return redirect()->route('materi.index');
    }
}
