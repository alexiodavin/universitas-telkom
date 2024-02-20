<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'dosen';
    protected $fillable = [
        'id',
        'user_id',
        'periode_id',
        'prodi_id',
        'dosen_import_id',
        'nama',
        'nama_gelar',
        'nip',
        'kode',
        'telepon',
        'alamat',
        'foto',
        'tahun_ajaran',
        'semester',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'periode_id' => 'integer',
        'dosen_import_id' => 'integer',
    ];

    protected $with = [
        'periode',
        // 'dosen_import',
    ];

    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'periode_id')->withTrashed();
    }

    public function prodi()
    {
        return $this->belongsTo('App\Models\Prodi', 'prodi_id')->withTrashed();
    }

    public function dosen_import()
    {
        return $this->belongsTo('App\Models\DosenImport', 'dosen_import_id')->withTrashed();
    }

    public function madusems()
    {
        return $this->hasMany(Madusem::class);
    }

}
