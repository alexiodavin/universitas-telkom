<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revisi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'revisi';
    protected $fillable = [
        'id',
        'sidang_id',
        'catatan_revisi',
        'nilai_akhir',
        'tanggal_pengumpulan_revisi',
        'tanggal_approve_pembimbing1',
        'tanggal_approve_pembimbing2',
        'tanggal_approve_penguji1',
        'tanggal_approve_penguji2',
    ];

    protected $casts = [
        'id' => 'integer',
        'sidang_id' => 'integer',
    ];

    protected $with = [
        'sidang',
    ];

    public function sidang(){
        return $this->belongsTo('App\Models\Sidang','sidang_id')->withTrashed();
    }
}
