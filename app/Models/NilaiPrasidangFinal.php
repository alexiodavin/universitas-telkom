<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiPrasidangFinal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nilai_prasidang_final';
    protected $fillable = [
        'id',
        'prasidang_id',
        'tanggal',
        'nilai_final',
        'nilai_mutu',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'prasidang_id' => 'integer',
        'nilai_final' => 'double',
    ];

    public function prasidang(){
        return $this->belongsTo('App\Models\Prasidang','prasidang_id')->withTrashed();
    }
}
