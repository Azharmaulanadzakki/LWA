<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PembayaranExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $pembayarans;

    public function __construct($pembayarans)
    {
        $this->pembayarans = $pembayarans->where('status', 'success ');
    }

    public function collection()
    {
        // Hitung total harga dari semua pembayaran
        $totalHarga = $this->pembayarans->sum('harga');

        // Buat koleksi data untuk diekspor
        $data = $this->pembayarans->map(function ($pembayaran) {
            return [
                // 'ID' => $pembayaran->id,
                'TANGGAL' => $pembayaran->tanggal, // Ubah 'tanggal' sesuai dengan nama kolom tanggal pada model Anda
                'MAPEL' => $pembayaran->mapels->judul,
                'USER' => $pembayaran->users->name,
                'HARGA' => number_format($pembayaran->harga, 2, ',', '.'), // Ubah 'harga' sesuai dengan nama kolom harga pada model Anda
                'STATUS' => $pembayaran->status,
                // Tambah kolom lain jika diperlukan
            ];
        });

        // Tambahkan total harga sebagai baris tambahan
        $data->push(['', '', '', 'Total Harga', number_format($totalHarga, 2, ',', '.')]);

        return $data;
    }

    public function headings(): array
    {
        return [
            // 'ID',
            'TANGGAL',
            'MAPEL',
            'USER',
            'HARGA',
            'STATUS',
            // Tambahkan kolom lain jika diperlukan
        ];
    }
}
