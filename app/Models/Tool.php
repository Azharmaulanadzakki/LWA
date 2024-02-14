<?php

namespace App\Models;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tool',
        'description',
        'image',
        'tautan',
        'parent_id',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'parent_id');
    }
}
