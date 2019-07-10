<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function puskesmas()
    {
        return $this->hasOne('App\Puskesmas');
    }
     public function pasien()
    {
        return $this->hasOne('App\Pasien');
    }
    public function announcement()
    {
        return $this->hasOne('App\Announcement');
    }
     public function imunisasi()
    {
         return $this->hasOne('App\Imunisasi');
    }
    public function programsekolah()
    {
        return $this->hasOne('App\ProgramSekolah');
    }
    public function dokumentasi()
    {
         return $this->hasOne('App\Dokumentasi');
    }
}
