<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailNilaiPrasidang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_nilai_prasidang';
    protected $fillable = [
        'id',
        'nilai_prasidang_id',
        'komponen_prasidang_id',
        'nilai',
    ];

    protected $casts = [
        'id' => 'integer',
        'nilai_prasidang_id' => 'integer',
        'komponen_prasidang_id' => 'integer',
    ];

    protected $with = [
        'komponen_prasidang',
    ];

    public function komponen_prasidang(){
        return $this->belongsTo('App\Models\KomponenPrasidang','komponen_prasidang_id')->withTrashed();
    }
}
