<?php

namespace App\Models;

use App\Models\Madusem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'mahasiswa';
    protected $fillable = [
        'id',
        'user_id',
        'periode_id',
        'mahasiswa_import_id',
        'nama',
        'nim',
        'telepon',
        'alamat',
        'foto',
        'tahun_ajaran',
        'semester',
        'madusem',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'periode_id' => 'integer',
        'mahasiswa_import_id' => 'integer',
    ];

    protected $with = [
        'periode',
        'mahasiswa_import',
    ];

    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }
    
    public function mahasiswa_import(){
        return $this->belongsTo('App\Models\MahasiswaImport','mahasiswa_import_id')->withTrashed();
    }

    public function komponenmadusem()
    {
        return $this->hasMany(KomponenMadusem::class, 'mahasiswa_id');
    }
    public function madusems()
    {
        return $this->hasMany(Madusem::class, 'mahasiswa_id');
    }
    public function madusem()
    {
        return $this->hasOne(Madusem::class, 'mahasiswa_id');
    }

}
