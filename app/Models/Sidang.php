<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sidang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sidang';
    protected $fillable = [
        'id',
        'pendaftaran_sidang_id',
        'mahasiswa_id',
        'pembimbing1_id',
        'pembimbing2_id',
        'penguji1_id',
        'penguji2_id',
        'periode_id',
        'judul_indo',
        'judul_inggris',
        'tahun_ajaran',
        'semester',
        'bulan',
        'jumlah_penguji',
    ];

    protected $casts = [
        'id' => 'integer',
        'pendaftaran_sidang_id' => 'integer',
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
        'pendaftaran_sidang',
        'jadwal_sidang',
        'nilai_final'
    ];

    public function pendaftaran_sidang()
    {
        return $this->belongsTo('App\Models\PendaftaranSidang', 'pendaftaran_sidang_id')->withTrashed();
    }

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

    public function jadwal_sidang()
    {
        return $this->hasOne('App\Models\JadwalSidang', 'sidang_id');
    }

    public function nilai_final()
    {
        return $this->hasOne('App\Models\NilaiSidangFinal', 'sidang_id')->withTrashed();
    }

    protected $appends = [
        'nilai_penguji1',
        'nilai_penguji2'
    ];

    public function getNilaiPenguji1Attribute()
    {
        return NilaiSidang::whereSidangId($this->attributes['id'])->wherePenguji(1)->first();
    }

    public function getNilaiPenguji2Attribute()
    {
        return NilaiSidang::whereSidangId($this->attributes['id'])->wherePenguji(2)->first();
    }
}
