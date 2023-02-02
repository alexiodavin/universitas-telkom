<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RuanganTerpakai extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'ruangan_terpakai';
    protected $fillable = [
        'id',
        'ruangan_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
