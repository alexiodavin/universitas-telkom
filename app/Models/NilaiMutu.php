<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiMutu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nilai_mutu';
    protected $fillable = [
        'id',
        'periode_id',
        'index',
        'nilai_min',
        'nilai_maks',
        'tahun_ajaran',
        'semester',
    ];

    protected $casts = [
        'id' => 'integer',
        'periode_id' => 'integer',
        'nilai_min' => 'integer',
        'nilai_maks' => 'integer',
    ];

    protected $with = [
        'periode',
    ];

    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }
}
