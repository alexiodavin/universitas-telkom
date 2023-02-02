<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailNilaiProposal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_nilai_proposal';
    protected $fillable = [
        'id',
        'nilai_proposal_id',
        'komponen_proposal_id',
        'nilai',
    ];

    protected $casts = [
        'id' => 'integer',
        'nilai_proposal_id' => 'integer',
        'komponen_proposal_id' => 'integer',
    ];

    protected $with = [
        'komponen_proposal',
    ];

    public function komponen_proposal(){
        return $this->belongsTo('App\Models\KomponenProposal','komponen_proposal_id')->withTrashed();
    }
}
