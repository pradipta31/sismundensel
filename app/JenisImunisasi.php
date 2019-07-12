<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisImunisasi extends Model
{
    protected $table = 'jenis_imunisasis';
    protected $fillable = [
    	'pasien_id',
    	'hepatitis_b_0',
    	'polio_1',
    	'polio_2',
    	'polio_3',
    	'polio_4',
        'ipv',
    	'bcg',
    	'dpthb_1',
    	'dpthb_2',
    	'dpthb_3',
    	'campak_rubela',
        'je'
    ];

    public function pasien(){
    	return $this->belongsTo('App\Pasien');
    }
}
