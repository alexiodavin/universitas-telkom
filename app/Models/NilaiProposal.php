<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiProposal extends Model
{
    use HasFactory;

    protected $table = 'nilai_proposal';
    protected $fillable = [
        'id',
        'proposal_id',
        'ruangan_id',
        'penguji',
        'tanggal_penilaian',
        'ruangan',
        'nilai_akhir',
        'catatan',
        'file',
    ];

    protected $casts = [
        'id' => 'integer',
        'proposal_id' => 'integer',
        'ruangan_id' => 'integer',
        'penguji' => 'integer',
        'nilai_akhir' => 'double',
    ];

    protected $with = [
        'ruangan',
        'detail_nilai',
        'proposal'
    ];
    
    public function ruangan(){
        return $this->belongsTo('App\Models\Ruangan','ruangan_id')->withTrashed();
    }

    public function detail_nilai(){
        return $this->hasMany('App\Models\DetailNilaiProposal')->withTrashed();
    }

    public function proposal(){
        return $this->belongsTo('App\Models\Proposal')->withTrashed();
    }
}
