<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentSemester extends Model
{
    use HasFactory;
    protected $table = 'current_semester';
    protected $fillable = [
        'semester',
        'tahun_ajaran'
    ];
}
