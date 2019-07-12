<?php

namespace App\Http\Controllers\Admin;

use App\Puskesmas;
use App\Announcement;
use App\Pasien;
use App\Imunisasi;
use App\ProgramImunisasi;
use App\Dokumentasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
    	$announs = Announcement::where('status','=','aktif')->get();
    	$countAnnoun = Announcement::where('status', '=', 'aktif')->count();
        $countPuskesmas = Puskesmas::where('status','=','aktif')->count();
        $countPasien = Pasien::count();
        $countImunisasi = Imunisasi::count();
        $countProgramImunisasi = ProgramImunisasi::count();
        $countDokumentasi = Dokumentasi::where('status','=', 'aktif')->count();
        $dokumentasis = Dokumentasi::where('status', '=', 'aktif')->get();
        return view('admin.dashboard', compact('announs','countPuskesmas','countAnnoun','countPasien','countImunisasi', 'countProgramImunisasi', 'countDokumentasi', 'dokumentasis'));
    }
}