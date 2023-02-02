<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeadlineSidang extends Model
{
    use HasFactory;
    protected $table = 'deadline_sidang';
    protected $fillable = [
        'prodi_id',
        'periode_id',
        'deadline',
    ];

    public function prodi(){
        return $this->belongsTo('App\Models\Prodi','prodi_id')->withTrashed();
    }
    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }
}
