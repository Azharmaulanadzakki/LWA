<?php

namespace App\Models;

use App\Models\Tool;
use App\Models\Materi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'description',
        'image',
        'harga',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'parent_id', 'ids');
    }

    public function tool()
    {
        return $this->hasMany(Tool::class, 'parent_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'mapel_user');
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'mapel_id', 'id');
    }

    public function deleteMapel()
    {
        $mapel = Mapel::find(1);
        $mapel->delete();
    }

}
