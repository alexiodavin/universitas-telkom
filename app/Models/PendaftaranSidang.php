<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftaranSidang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pendaftaran_sidang';
    protected $fillable = [
        'id',
        'periode_id',
        'mahasiswa_id',
        'tanggal_maksimal_daftar',
        'transkip_nilai',
        'ksm',
        'ktp',
        'ijazah',
        'surat_pernyataan',
        'status_pendaftaran',
        'tahun_ajaran',
        'semester',        
    ];

    protected $casts = [
        'id' => 'integer',
        'periode_id' => 'integer',
        'mahasiswa_id' => 'integer',
    ];

    protected $with = [
        'periode',
        'mahasiswa',
    ];

    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }

    public function mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa','mahasiswa_id')->withTrashed();
    }
}
