<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiProposalFinal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nilai_proposal_final';
    protected $fillable = [
        'id',
        'proposal_id',
        'tanggal',
        'nilai_final',
        'nilai_mutu',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'proposal_id' => 'integer',
        'nilai_final' => 'double',
    ];

    // protected $with = [
    //     'proposal',
    // ];


    public function proposal(){
        return $this->belongsTo('App\Models\Proposal', 'proposal_id');
    }
    
}
