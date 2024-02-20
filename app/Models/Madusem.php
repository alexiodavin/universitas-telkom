<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\KomponenMadusem;
use App\Models\KomponenMadusemPivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Madusem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'madusem';
    protected $fillable = [
        'pbb_1_id',
        'pbb_2_id',
        'puj_1_id',
        'puj_2_id',
        'mahasiswa_id',
        'keterangan',
        'tanggal_selesai',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function komponenMadusem()
    {
        return $this->belongsToMany(KomponenMadusem::class, 'komponen_madusem_pivot')
                    ->withPivot('nilai_komponen');
    }       
    
    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }

    public function deadline_sidang(){
        return $this->belongsTo('App\Models\DeadlineSidang', 'deadline_sidang_id')->withTrashed();
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function pbb1()
    {
        return $this->belongsTo(Dosen::class, 'pbb_1_id');
    }

    public function pbb2()
    {
        return $this->belongsTo(Dosen::class, 'pbb_2_id');
    }

    public function puj1()
    {
        return $this->belongsTo(Dosen::class, 'puj_1_id');
    }

    public function puj2()
    {
        return $this->belongsTo(Dosen::class, 'puj_2_id');
    }

    public function komponenMadusemPivots()
    {
        return $this->hasMany(KomponenMadusemPivot::class);
    }


}
