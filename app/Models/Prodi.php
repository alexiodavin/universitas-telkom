<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prodi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'prodi';
    protected $fillable = [
        'id',
        'periode_id',
        'koor_id',
        'kaprodi_id',
        'kode',
        'singkatan',
        'nama',
        'keterangan',
        'tahun_ajaran',
        'semester',
    ];

    protected $casts = [
        'id' => 'integer',
        'periode_id' => 'integer',
        'koor_id' => 'integer',
        'kaprodi_id' => 'integer',
    ];

    protected $with = [
        'periode',
        'koor',
        // 'kaprodi',
    ];

    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }

    public function koor(){
        return $this->belongsTo('App\Models\Dosen','koor_id')->withTrashed();
    }

    // public function kaprodi(){
    //     return $this->belongsTo('App\Models\Dosen','kaprodi_id')->withTrashed();
    // }

    protected $appends = [
        'kaprodi'
    ];

    public function getKaprodiAttribute(){
        return Dosen::find($this->attributes['kaprodi_id']);
    }
}
