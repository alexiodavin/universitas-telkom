<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriJudulProposal extends Model
{
    use HasFactory;

    protected $table = 'histori_judul_proposal';
    protected $guarded = ['id'];
    protected $with = [
        'proposal',
    ];

    public function proposal()
    {
        return $this->belongsTo('App\Models\Proposal', 'proposal_id')->withTrashed();
    }
}
