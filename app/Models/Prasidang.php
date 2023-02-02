<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prasidang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'prasidang';
    protected $fillable = [
        'id',
        'mahasiswa_id',
        'pembimbing1_id',
        'pembimbing2_id',
        'penguji1_id',
        'penguji2_id',
        'periode_id',
        'judul_indo',
        'judul_inggris',
        'tahun_ajaran',
        'keterangan',
        'semester',
        'keterangan',
        'jumlah_penguji',
    ];

    protected $casts = [
        'id' => 'integer',
        'mahasiswa_id' => 'integer',
        'pembimbing1_id' => 'integer',
        'pembimbing2_id' => 'integer',
        'penguji1_id' => 'integer',
        'penguji2_id' => 'integer',
        'periode_id' => 'integer',
        'jumlah_penguji' => 'integer',
    ];

    protected $with = [
        'mahasiswa',
        'pembimbing1',
        'pembimbing2',
        'penguji1',
        'penguji2',
        'periode',
        'jadwal_prasidang',
        'nilai_final',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa', 'mahasiswa_id')->withTrashed();
    }

    public function pembimbing1()
    {
        return $this->belongsTo('App\Models\Dosen', 'pembimbing1_id')->withTrashed();
    }

    public function pembimbing2()
    {
        return $this->belongsTo('App\Models\Dosen', 'pembimbing2_id')->withTrashed();
    }

    public function penguji1()
    {
        return $this->belongsTo('App\Models\Dosen', 'penguji1_id')->withTrashed();
    }

    public function penguji2()
    {
        return $this->belongsTo('App\Models\Dosen', 'penguji2_id')->withTrashed();
    }

    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'periode_id')->withTrashed();
    }

    public function jadwal_prasidang()
    {
        return $this->hasOne('App\Models\JadwalPrasidang', 'prasidang_id');
    }

    public function nilai_final()
    {
        return $this->hasOne('App\Models\NilaiPrasidangFinal', 'prasidang_id')->withTrashed();
    }

    protected $appends = [
        'nilai_penguji1',
        'nilai_penguji2'
    ];

    public function getNilaiPenguji1Attribute()
    {
        return NilaiPrasidang::wherePrasidangId($this->attributes['id'])->wherePenguji(1)->first();
    }

    public function getNilaiPenguji2Attribute()
    {
        return NilaiPrasidang::wherePrasidangId($this->attributes['id'])->wherePenguji(2)->first();
    }
}
