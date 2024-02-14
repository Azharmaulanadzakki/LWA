<?php

namespace App\Models;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'parent_id',
        'tautan',
        
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'parent_id', 'id');
    }

}

