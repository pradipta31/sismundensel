<?php

namespace App\Http\Controllers\Kepmas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Pasien;
use App\Imunisasi;
use App\ProgramSekolah;
use App\Dokumentasi;


class DashboardController extends Controller
{
   public function index(){
    	$announs = Announcement::where('status','=','aktif')->get();
    	$countAnnoun = Announcement::where('status', '=', 'aktif')->count();
        $countPasien = Pasien::count();
        $countImunisasi = Imunisasi::count();
        $countImunisasi = Imunisasi::count();
        $countProgramSekolah = ProgramSekolah::count();
        $countDokumentasi = Dokumentasi::where('status','=', 'aktif')->count();
        $dokumentasis = Dokumentasi::where('status', '=', 'aktif')->get();
    	return view('kepmas.dashboard', compact('announs','countPasien','countImunisasi', 'countProgramSekolah', 'countDokumentasi', 'dokumentasis'));
    }
}
