<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DosenKaprodi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'dosen_kaprodi';
    protected $fillable = [
        'id',
        'dosen_id',
        'prodi_id',
        'periode_id',
        'tahun_ajaran',
        'semester',
        'awal_menjabat',
        'akhir_menjabat',
    ];

    protected $casts = [
        'id' => 'integer',
        'dosen_id' => 'integer',
        'prodi_id' => 'integer',
        'periode_id' => 'integer',
    ];

    protected $with = [
        'dosen',
        'prodi',
        'periode',
    ];

    public function dosen()
    {
        return $this->belongsTo('App\Models\Dosen', 'dosen_id')->withTrashed();
    }

    public function prodi()
    {
        return $this->belongsTo('App\Models\Prodi', 'prodi_id')->withTrashed();
    }

    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'periode_id')->withTrashed();
    }
}
