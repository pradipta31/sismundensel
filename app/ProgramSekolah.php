<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramSekolah extends Model
{
     protected $fillable = [
      'user_id','puskesmas_id', 'nama_sekolah', 'tanggal_imunisasi', 'jumlah_siswa', 'jumlah_imunisasi', 'jenis_imunisasi'
    ];


  public function puskesmas(){
  	return $this->belongsTo('App\Puskesmas');
  }
}
