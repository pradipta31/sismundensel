<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('login');
}); // Menampilkan form Login dengan url '/'

Route::get('/home', function(){
    return redirect('/redirecting');
});
Route::get('/redirecting', function(){
    if(Auth::user()->level == 'admin'){
        return redirect('admin');
    }elseif(Auth::user()->level == 'kepmas'){
        return redirect('kepmas');
    }
}); // cek url redirecting apakah level admin maka redirect ke admin begitu juga dengan kepmas
Route::group(['middleware' => 'level:admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function(){ // Route group nanti kalo ketemu aku jelasin
    Route::get('/', function(){
        return redirect('admin/dashboard');
    });
    Route::get('dashboard', 'DashboardController@index');
    // PUSKESMAS
    Route::get('puskesmas/tambah-puskesmas', 'PuskesmasController@tambahPuskesmas');
    Route::post('puskesmas/tambah-puskesmas', 'PuskesmasController@simpanPuskesmas');
    Route::get('puskesmas/data-puskesmas', 'PuskesmasController@dataPuskesmas');
    Route::get('puskesmas/{id}/edit-puskesmas', 'PuskesmasController@editPuskesmas');
    Route::put('puskesmas/{id}/edit-puskesmas', 'PuskesmasController@updatePuskesmas');
    // END PUSKESMAS

    //Bayi
    Route::get('pasien/tambah-pasien', 'PasienController@tambahPasien');
    Route::post('pasien/tambah-pasien', 'PasienController@simpanPasien');
    Route::get('pasien/data-pasien', 'PasienController@dataPasien');
    Route::get('pasien/{id}/edit-pasien', 'PasienController@editPasien');
    Route::put('pasien/{id}/edit-pasien', 'PasienController@updatePasien');
    Route::get('pasien/cetak-pasien/{user_id}', 'PasienController@downloadPasien');
    //end bayi

    //Imunisasi
    Route::get('imunisasi/tambah-imunisasi', 'ImunisasiController@tambahImunisasi');
    Route::post('imunisasi/tambah-imunisasi', 'ImunisasiController@simpanImunisasi');
    Route::get('imunisasi/data-imunisasi', 'ImunisasiController@dataImunisasi');
    Route::get('imunisasi/{id}/edit-imunisasi', 'ImunisasiController@editImunisasi');
    Route::put('imunisasi/{id}/edit-imunisasi', 'ImunisasiController@updateImunisasi');
    Route::get('imunisasi/{id}/riwayat', 'ImunisasiController@getRiwayat');
    Route::get('imunisasi/cetak-imunisasi/{user_id}', 'ImunisasiController@downloadImunisasi');
    //end Imunisasi

    Route::get('program/tambah-program', 'ProgramSekolahController@tambahProgramSekolah');
    Route::post('program/tambah-program', 'ProgramSekolahController@simpanProgramSekolah');
    Route::get('program/data-program', 'ProgramSekolahController@dataProgramSekolah');
    Route::get('program/{id}/edit-program', 'ProgramSekolahController@editProgramSekolah');
    Route::put('program/{id}/edit-program', 'ProgramSekolahController@updateProgramSekolah');
    Route::get('program/cetak-program/{user_id}', 'ProgramSekolahController@downloadProgramSekolah');

    Route::get('dokumentasi/tambah-dokumentasi', 'DokumentasiController@tambahDokumentasi');
    Route::post('dokumentasi/tambah-dokumentasi', 'DokumentasiController@simpanDokumentasi');
    Route::get('dokumentasi/data-dokumentasi', 'DokumentasiController@dataDokumentasi');
    Route::get('dokumentasi/{id}/edit-dokumentasi', 'DokumentasiController@editDokumentasi');
    Route::put('dokumentasi/{id}/edit-dokumentasi', 'DokumentasiController@updateDokumentasi');
});

Route::group(['middleware' => 'level:kepmas', 'prefix' => 'kepmas', 'namespace' => 'Kepmas'], function(){
    Route::get('/', function(){
        return redirect('kepmas/dashboard');
    });
    Route::get('dashboard', 'DashboardController@index');

    Route::get('announcement/tambah-announcement', 'AnnouncementController@tambahAnnouncement');
    Route::post('announcement/tambah-announcement', 'AnnouncementController@simpanAnnouncement');
    Route::get('announcement/data-announcement', 'AnnouncementController@dataAnnouncement');
    Route::get('announcement/{id}/edit-announcement', 'AnnouncementController@editAnnouncement');
    Route::put('announcement/{id}/edit-announcement', 'AnnouncementController@updateAnnouncement');

    Route::get('pasien/tambah-pasien', 'PasienController@tambahPasien');
    Route::post('pasien/tambah-pasien', 'PasienController@simpanPasien');
    Route::get('pasien/data-pasien', 'PasienController@dataPasien');
    Route::get('pasien/{id}/edit-pasien', 'PasienController@editPasien');
    Route::put('pasien/{id}/edit-pasien', 'PasienController@updatePasien');
    Route::get('pasien/cetak-pasien/{user_id}', 'PasienController@downloadPasien');

    Route::get('imunisasi/tambah-imunisasi', 'ImunisasiController@tambahImunisasi');
    Route::post('imunisasi/tambah-imunisasi', 'ImunisasiController@simpanImunisasi');
    Route::get('imunisasi/data-imunisasi', 'ImunisasiController@dataImunisasi');
    Route::get('imunisasi/{id}/edit-imunisasi', 'ImunisasiController@editImunisasi');
    Route::put('imunisasi/{id}/edit-imunisasi', 'ImunisasiController@updateImunisasi');
    Route::get('imunisasi/{id}/riwayat', 'ImunisasiController@getRiwayat');
    Route::get('imunisasi/cari', 'ImunisasiController@cariImunisasi');
    Route::get('imunisasi/cetak-imunisasi/{user_id}', 'ImunisasiController@downloadImunisasi');
    Route::get('imunisasi/cetak-imunisasi/{tgl_imunisasi}/{jenis_imunisasi}', 'ImunisasiController@dwlImunisasi');

    Route::get('program/tambah-program', 'ProgramSekolahController@tambahProgramSekolah');
    Route::post('program/tambah-program', 'ProgramSekolahController@simpanProgramSekolah');
    Route::get('program/data-program', 'ProgramSekolahController@dataProgramSekolah');
    Route::get('program/{id}/edit-program', 'ProgramSekolahController@editProgramSekolah');
    Route::put('program/{id}/edit-program', 'ProgramSekolahController@updateProgramSekolah');
    Route::get('program/cetak-program/{user_id}', 'ProgramSekolahController@downloadProgramSekolah');
});
