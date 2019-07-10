<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
	protected $table = 'dokumentasi';
     protected $fillable = [
        'user_id', 'nama_kegiatan', 'tanggal', 'foto', 'status'
    ];

    public function user()
  {
      return $this->belongsTo('App\User');
  }
}
