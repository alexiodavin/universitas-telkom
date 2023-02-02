<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiPrasidang extends Model
{
    use HasFactory;

    protected $table = 'nilai_prasidang';
    protected $fillable = [
        'id',
        'prasidang_id',
        'ruangan_id',
        'penguji',
        'tanggal_penilaian',
        'ruangan',
        'nilai_akhir',
        'catatan',
        'file',
    ];

    protected $casts = [
        'id' => 'integer',
        'prasidang_id' => 'integer',
        'ruangan_id' => 'integer',
        'penguji' => 'integer',
        'nilai_akhir' => 'double',
    ];

    protected $with = [
        'ruangan',
        'detail_nilai'
    ];
    
    public function ruangan(){
        return $this->belongsTo('App\Models\Ruangan','ruangan_id')->withTrashed();
    }

    public function detail_nilai(){
        return $this->hasMany('App\Models\DetailNilaiPrasidang')->withTrashed();
    }

    public function prasidang(){
        return $this->belongsTo('\App\Models\Prasidang', 'prasidang_id')->withTrashed();
    }
}
