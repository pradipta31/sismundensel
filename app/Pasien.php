<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'user_id', 'puskesmas_id', 'nama_pasien', 'tempat_lahir', 'tgl_lahir', 'jk_pasien', 'nama_ortu', 'umur', 'alamat'
    ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }
    public function puskesmas(){
    return $this->belongsTo('App\Puskesmas');
  }

  public function imunisasi(){
    return $this->hasOne('App\Imunisasi');
  }

  public function jenisImunisasi(){
    return $this->hasOne('App\JenisImunisasi');
  }
}
