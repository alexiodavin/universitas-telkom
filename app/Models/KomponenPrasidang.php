<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KomponenPrasidang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'komponen_prasidang';
    protected $fillable = [
        'id',
        'prodi_id',
        'periode_id',
        'nama_komponen',
        'persentase',
        'keterangan',
        'tanggal_deadline_input_nilai',
        'tahun_ajaran',
        'semester',
        'deadline_prasidang_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'prodi_id' => 'integer',
        'periode_id' => 'integer',
    ];

    protected $with = [
        'prodi',
        'periode',
    ];

    public function prodi(){
        return $this->belongsTo('App\Models\Prodi','prodi_id')->withTrashed();
    }

    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }

    public function deadline_prasidang(){
        return $this->belongsTo('App\Models\DeadlinePrasidang', 'deadline_prasidang_id')->withTrashed();
    }
}
