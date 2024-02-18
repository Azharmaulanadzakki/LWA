<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = FAQ::latest()->paginate(10);
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        // Buat FAQ baru berdasarkan input yang diterima
        FAQ::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FAQ $faq)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        // Perbarui FAQ berdasarkan input yang diterima
        $faq->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        // Hapus FAQ dari database
        $faq->delete();
    
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
