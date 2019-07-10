<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'alamat', 'status'
    ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }
  public function pasien(){
  	return $this->hasOne('App\Pasien');
  }
  public function imunisasi(){
  	return $this->belongsTo('App\Imunisasi');
  }
}
