<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailNilaiSidang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_nilai_sidang';
    protected $fillable = [
        'id',
        'nilai_sidang_id',
        'komponen_sidang_id',
        'nilai',
    ];

    protected $casts = [
        'id' => 'integer',
        'nilai_sidang_id' => 'integer',
        'komponen_sidang_id' => 'integer',
    ];

    protected $with = [
        'komponen_sidang',
    ];

    public function komponen_sidang(){
        return $this->belongsTo('App\Models\KomponenSidang','komponen_sidang_id')->withTrashed();
    }
}
