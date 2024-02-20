<?php

namespace App\Models;

use App\Models\Prodi;
use App\Models\Madusem;
use Illuminate\Support\Str;
use App\Models\KomponenMadusemPivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KomponenMadusem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'komponen_madusem';
    protected $fillable = [
        'nama_komponen', 'presentase', 'slug',
    ];


    protected $casts = [
        'id' => 'integer',
        'prodi_id' => 'integer',
        'periode_id' => 'integer',
    ];

    protected $with = [
        'prodi',
        'periode',
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function madusem()
    {
        return $this->hasMany(Madusem::class);
    }
    public function madusems()
    {
        return $this->belongsToMany(Madusem::class, 'komponen_madusem_pivot')
                    ->withPivot('nilai_komponen');
    }
    

    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }

    public function deadline_sidang(){
        return $this->belongsTo('App\Models\DeadlineSidang', 'deadline_sidang_id')->withTrashed();
    }

    public function komponenMadusemPivot()
    {
        return $this->hasMany(KomponenMadusemPivot::class);
    }
}
