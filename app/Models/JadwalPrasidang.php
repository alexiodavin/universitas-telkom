<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalPrasidang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jadwal_prasidang';
    protected $fillable = [
        'id',
        'prasidang_id',
        'ruangan_id',
        'tanggal_prasidang',
        'bulan',
        'jam_mulai_prasidang',
        'jam_selesai_prasidang',
        'ruangan',
    ];

    protected $casts = [
        'id' => 'integer',
        'prasidang_id' => 'integer',
        'ruangan_id' => 'integer',
    ];

    protected $with = [
        'ruangan_prasidang',
    ];

    public function ruangan_prasidang(){
        return $this->belongsTo('App\Models\Ruangan','ruangan_id')->withTrashed();
    }

    public function prasidang(){
        return $this->belongsTo('App\Models\Prasidang','prasidang_id')->withTrashed();
    }
}
