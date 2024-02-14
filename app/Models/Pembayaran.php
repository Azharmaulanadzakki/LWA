<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'status', 'harga', 'tanggal', 'mapel_id', 'user_id', 'snapToken'];

    
    public function mapels()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
