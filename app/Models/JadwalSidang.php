<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalSidang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jadwal_sidang';
    protected $fillable = [
        'id',
        'sidang_id',
        'ruangan_id',
        'tanggal_sidang',
        'jam_mulai_sidang',
        'jam_selesai_sidang',
        'ruangan',
        'bulan'
    ];

    protected $casts = [
        'id' => 'integer',
        'sidang_id' => 'integer',
        'ruangan_id' => 'integer',
    ];

    protected $with = [
        'ruangan',
    ];

    public function ruangan(){
        return $this->belongsTo('App\Models\Ruangan','ruangan_id')->withTrashed();
    }

    public function sidang(){
        return $this->belongsTo('App\Models\Sidang','sidang_id')->withTrashed();
    }
}
