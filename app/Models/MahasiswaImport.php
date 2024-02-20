<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MahasiswaImport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'mahasiswa_import';
    protected $fillable = [
        'id',
        'periode_id',
        'prodi_id',
        'tahun_ajaran',
        'semester',
    ];

    protected $casts = [
        'id' => 'integer',
        'periode_id' => 'integer',
        'prodi_id' => 'integer',
    ];

    protected $with = [
        'periode',
    ];

    protected $appends = [
        'prodi',
    ];

    public function getProdiAttribute(){
        return Prodi::find($this->attributes['prodi_id']);
    }

    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }
    
    public function prodi(){
        return $this->belongsTo('App\Models\Prodi','prodi_id')->withTrashed();
    }
    public function mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa','mahasiswa_id')->withTrashed();
    }
}
