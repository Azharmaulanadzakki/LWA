<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection, WithHeadings
{
    protected $pembayarans;

    public function __construct($pembayarans)
    {
        $this->pembayarans = $pembayarans;
    }

    public function collection()
    {
        return $this->pembayarans;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            // Add more headings as needed
        ];
    }
}
