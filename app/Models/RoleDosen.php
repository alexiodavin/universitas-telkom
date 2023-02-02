<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleDosen extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'role_dosen';
    protected $fillable = [
        'id',
        'periode_id',
        'kode',
        'nama',
        'tahun_ajaran',
        'semester',
    ];

    protected $casts = [
        'id' => 'integer',
        'periode_id' => 'integer',
    ];

    protected $with = [
        'periode',
    ];

    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }
}
