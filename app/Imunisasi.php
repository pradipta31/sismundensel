<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
     protected $fillable = [
        'user_id', 'puskesmas_id', 'pasien_id', 'tgl_imunisasi'
    ];


  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function puskesmas(){
  	return $this->belongsTo('App\Puskesmas');
  }

  public function pasien(){
    return $this->belongsTo('App\Pasien');
  }
}