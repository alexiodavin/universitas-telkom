<?php

namespace App\Models;

use App\Models\Madusem;
use App\Models\KomponenMadusem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KomponenMadusemPivot extends Model
{
    use HasFactory;
    protected $table = 'komponen_madusem_pivot';
    protected $guarded = [];

    public function madusem()
    {
        return $this->belongsTo(Madusasem::class);
    }

    public function komponenMadusem()
    {
        return $this->belongsTo(KomponenMadusem::class);
    }
}
