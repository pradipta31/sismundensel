<?php

namespace App\Lib;

use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class Helper {

  public static function url($u = ''){
    $url = 'admin/';
    if (Auth::user()->level == 'kepmas') {
      $url = 'kepmas/';
    }
    return url($url.$u);
  }

  public static function type(){
    $type = 'Admin';
    if (Auth::user()->level == 'Kepmas') {
      $type = 'Kepmas';
    }
    return $type;
  }
}
