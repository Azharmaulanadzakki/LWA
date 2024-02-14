<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelUser extends Model
{
    use HasFactory;

    protected $table = 'mapel_user';

    protected $fillable = ['id', 'mapel_id', 'user_id'];
}
