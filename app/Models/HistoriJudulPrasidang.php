<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriJudulPrasidang extends Model
{
    use HasFactory;

    protected $table = 'histori_judul_prasidang';
    protected $guarded = ['id'];
    protected $with = [
        'prasidang',
    ];

    public function prasidang()
    {
        return $this->belongsTo('App\Models\Prasidang', 'prasidang_id')->withTrashed();
    }
}
