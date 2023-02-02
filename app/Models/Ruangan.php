<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruangan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ruangan';
    protected $fillable = [
        'id',
        'kode',
        'nama',
        'keterangan',
        'is_active',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
