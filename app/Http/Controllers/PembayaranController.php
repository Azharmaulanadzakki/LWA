<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $pembayarans = $this->getDataByMonthAndYear($bulan, $tahun)->latest()->paginate(10);

        return view('admin.pembayaran.index', compact('pembayarans', 'bulan', 'tahun'));
    }

    public function getDataByMonthAndYear($bulan, $tahun)
    {
        return Pembayaran::whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun);
    }

    // untuk export ke excel
    public function export(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        // Periksa apakah ada data yang tersedia untuk bulan yang dipilih
        $dataAvailable = Pembayaran::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->exists();

        if (!$dataAvailable) {
            return Redirect::back()->with('error', 'Tidak ada data yang tersedia untuk bulan yang dipilih.');
        }

        // Ambil data untuk diekspor
        $pembayarans = Pembayaran::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->get();

        return Excel::download(new PembayaranExport($pembayarans), 'pembayaran_' . $bulan . '_' . $tahun . '.xlsx');
    }

    // public function exportByMonth(Request $request)
    // {
    //     $bulan = $request->bulan; // Anda bisa mendapatkan bulan dari inputan form atau dari mana pun sesuai kebutuhan Anda
    //     $tahun = $request->tahun; // Anda bisa mendapatkan tahun dari inputan form atau dari mana pun sesuai kebutuhan Anda

    //     // Mengambil data pembayaran sesuai dengan bulan dan tahun yang ditentukan
    //     $pembayarans = Pembayaran::whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();

    //     return Excel::download(new PembayaranExport($pembayarans), 'pembayaran_' . $bulan . '_' . $tahun . '.xlsx');
    // }

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
    public function store(string $id)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
