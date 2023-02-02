<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'role_id',
        'prodi_id',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'role_id' => 'integer',
        'prodi_id' => 'integer',
    ];

    protected $with = [
        'role',
        'admin',
        'dosen',
        'mahasiswa',
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role','role_id')->withTrashed();
    }

    public function prodi(){
        return $this->belongsTo('App\Models\Prodi','prodi_id')->withTrashed();
    }

    public function admin(){
    	return $this->hasOne('App\Models\Admin','user_id')->withTrashed();
    }

    public function dosen(){
    	return $this->hasOne('App\Models\Dosen','user_id')->withTrashed();
    }

    public function mahasiswa(){
    	return $this->hasOne('App\Models\Mahasiswa','user_id')->withTrashed();
    }

    protected $appends = [
        'dosen_koordinator_pa',
    ];

    public function getDosenKoordinatorPaAttribute(){
        return DosenKoordinatorPA::whereDosenId(auth()->user()->dosen->id ?? null)->first();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
