<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeadlineProposal extends Model
{
    use HasFactory;

    protected $table = 'deadline_proposal';
    protected $fillable = [
        'prodi_id',
        'periode_id',
        'deadline',
    ];

    public function prodi(){
        return $this->belongsTo('App\Models\Prodi','prodi_id')->withTrashed();
    }
    public function periode(){
        return $this->belongsTo('App\Models\Periode','periode_id')->withTrashed();
    }
}
