<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiSidangFinal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nilai_sidang_final';
    protected $fillable = [
        'id',
        'sidang_id',
        'tanggal',
        'nilai_final',
        'nilai_mutu',
        'status',
        'keterangan'
    ];

    protected $casts = [
        'id' => 'integer',
        'sidang_id' => 'integer',
        'nilai_final' => 'double',
    ];

    // protected $with = [
    //     'sidang'
    // ];

    public function sidang(){
        return $this->belongsTo('App\Models\Sidang','sidang_id')->withTrashed();
    }
}
