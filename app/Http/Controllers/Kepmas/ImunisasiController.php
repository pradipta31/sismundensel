<?php

namespace App\Http\Controllers\Kepmas;
use Validator;
use Session;
use Auth;
use App\User;
use App\Puskesmas;
use App\Pasien;
use App\Imunisasi;
use App\JenisImunisasi;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImunisasiController extends Controller
{
    public function tambahImunisasi(){
        $puskesmas = Puskesmas::all();
        $pasiens = Pasien::all();
        return view('kepmas.imunisasi.tambah-imunisasi', compact('puskesmas','pasiens'));
    }
    public function SimpanImunisasi(Request $r){
        $validator = Validator::make($r->all(),[
            'puskesmas_id' =>'required',
            'pasien_id' =>'required',
            'jenis_imunisasi' =>'required'
        ]);
        $pasien = Pasien::where('id',$r->pasien_id)->first();
        if (!$validator->fails()) {
            $imunisasi = Imunisasi::create([
                'user_id' => Auth::user()->id,
                'puskesmas_id' => $r->puskesmas_id,
                'pasien_id' => $r->pasien_id,
                'tgl_imunisasi'=>$r->tgl_imunisasi
                ]);

            $check_jenis = JenisImunisasi::where('pasien_id',$r->pasien_id)->first();
            $jenis = $r->jenis_imunisasi;
            if ($check_jenis == null) {
                if ($jenis == 'hepatitis_b_0') {
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'hepatitis_b_0' => '1'
                    ]);
                }elseif($jenis == 'polio_1'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'polio_1' => '1'
                    ]);
                }elseif($jenis == 'polio_2'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'polio_2' => '1'
                    ]);
                }elseif($jenis == 'polio_3'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'polio_3' => '1'
                    ]);
                }elseif($jenis == 'polio_4'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'polio_4' => '1'
                    ]);
                }elseif($jenis == 'ipv'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'ipv' => '1'
                    ]);
                }elseif($jenis == 'bcg'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'bcg' => '1'
                    ]);
                }elseif($jenis == 'dpthb_1'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'dpthb_1' => '1'
                    ]);
                }elseif($jenis == 'dpthb_2'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'dpthb_2' => '1'
                    ]);
                }elseif($jenis == 'dpthb_3'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'dpthb_3' => '1'
                    ]);
                }elseif($jenis == 'campak_rubela'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'campak_rubela' => '1'
                    ]);
                }elseif($jenis == 'je'){
                    $jenisI = JenisImunisasi::create([
                        'pasien_id' => $r->pasien_id,
                        'je' => '1'
                    ]);
                }
                 // lanjutin dari elseif nya nov
            }else{
                if ($jenis == 'hepatitis_b_0') {
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'hepatitis_b_0' => '1'
                    ]);
                }elseif($jenis == 'polio_1'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'polio_1' => '1'
                    ]);
                }elseif($jenis == 'polio_2'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'polio_2' => '1'
                    ]);
                }elseif($jenis == 'polio_3'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'polio_3' => '1'
                    ]);
                }elseif($jenis == 'polio_4'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'polio_4' => '1'
                    ]);
                }elseif($jenis == 'ipv'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'ipv' => '1'
                    ]);   
                }elseif($jenis == 'bcg'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'bcg' => '1'
                    ]);
                }elseif($jenis == 'dpthb_1'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'dpthb_1' => '1'
                    ]);
                }elseif($jenis == 'dpthb_2'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'dpthb_2' => '1'
                    ]);
                }elseif($jenis == 'dpthb_3'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'dpthb_3' => '1'
                    ]);
                }elseif($jenis == 'campak_rubela'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'campak_rubela' => '1'
                    ]);
                }elseif($jenis == 'je'){
                    $jenisI = JenisImunisasi::where('pasien_id',$r->pasien_id)->update([
                        'je' => '1'
                    ]);
                }
            }
            Session::flash('sukses', 'Data imunisasi berhasil disimpan');
            return redirect('kepmas/imunisasi/data-imunisasi');
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }

        public function dataImunisasi(){
        $imunisasi = Imunisasi::all();
        $users = User::where('id','=',Auth::user()->id)->first();
        return view('kepmas.imunisasi.data-imunisasi', compact('imunisasi','users'));
    }

    public function getRiwayat($id){
        $imunisasi = Imunisasi::where('pasien_id',$id)->first();
        $imunisasi_p = JenisImunisasi::where('pasien_id',$imunisasi->pasien_id)->get();
        return view('kepmas.imunisasi.riwayat',compact('imunisasi','imunisasi_p'));
    }

    public function editImunisasi($id){
        $puskesmas = Puskesmas::all();
        $imunisasi= Imunisasi::findOrFail($id);
        return view('kepmas.imunisasi.edit-imunisasi', compact('imunisasi', 'puskesmas'));
    }

    public function updateImunisasi(Request $r, $id){
        $validator = Validator::make($r->all(),[
            'puskesmas_id' =>'required',
            'nama_pasien' =>'required',
            'tempat_lahir' =>'required',
            'tgl_lahir'=>'required',
            'jk_bayi' =>'required',
            'umur' =>'required',
            'nama_orangtua' =>'required',
            'alamat' =>'required',
            'jenis_imunisasi' =>'required'
        ]);
        if(!$validator->fails()){
            $imunisasi = Imunisasi::findOrFail($id)->update([
                'user_id' => Auth::user()->id,
                'puskesmas_id' => $r->puskesmas_id,
                'nama_pasien' => $r->nama_pasien,
                'tempat_lahir' =>$r->tempat_lahir,
                'tgl_lahir'=>$r->tgl_lahir,
                'jk_bayi' =>$r->jk_bayi,
                'umur' =>$r->umur,
                'nama_orangtua' =>$r->nama_orangtua,
                'alamat' =>$r->alamat,
                'jenis_imunisasi' =>$r->jenis_imunisasi
            ]);
                Session::flash('sukses', 'Data imunisasi berhasil diubah');
                return redirect('kepmasimunisasi/data-imunisasi');
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }

    public function cariImunisasi(Request $r){
      $search = $r->all();
      $tgl_imunisasi = $r->tgl_imunisasi;
      $jenis = $r->jenis_imunisasi;
      $results = [];
      if ($search) {
        $results = Imunisasi::where('tgl_imunisasi', 'LIKE', '%'. $tgl_imunisasi .'%')
        ->where('jenis_imunisasi', 'LIKE', '%'. $jenis .'%')
        ->get();
        if ($results != null) {
          $users = User::where('id','=',Auth::user()->id)->first();
          return view('kepmas.imunisasi.cari-data-imunisasi')->with([
            'tgl_imunisasi' => $tgl_imunisasi,
            'jenis' => $jenis,
            'results' => $results,
            'users' => $users
          ]);
        }else{
          dd('tidak ditemukan');
        }
      }
    }
    public function downloadImunisasi($user_id){
        $spreadsheet = new Spreadsheet();
        $imunisasi = Imunisasi::all();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA PASIEN');
        $sheet->setCellValue('C1', 'TEMPAT LAHIR');
        $sheet->setCellValue('D1', 'TANGGAL LAHIR');
        $sheet->setCellValue('E1', 'JENIS KELAMIN BAYI');
        $sheet->setCellValue('F1', 'UMUR');
        $sheet->setCellValue('G1', 'NAMA ORANG TUA');
        $sheet->setCellValue('H1', 'ALAMAT');
        $sheet->setCellValue('I1', 'TANGGAL IMUNISASI');
        $sheet->setCellValue('J1', 'JENIS IMUNISASI');

        $row = 2;
        $nomor = 1;
        foreach($imunisasi as $imunisasis){
            $jenis_imunisasi = '';
            if($imunisasis->jenis_imunisasi == 'hepatitis_b_0'){
              $jenis = 'Hepatitis B 0';
            }elseif($imunisasis->jenis_imunisasi == 'polio_1'){
              $jenis = 'Polio 1';
            }elseif($imunisasis->jenis_imunisasi == 'polio_2'){
              $jenis = 'Polio 2';
            }elseif($imunisasis->jenis_imunisasi == 'polio_3'){
              $jenis = 'Polio 3';
            }elseif($imunisasis->jenis_imunisasi == 'polio_4'){
              $jenis = 'Polio 4';
            }elseif($imunisasis->jenis_imunisasi == 'ipv'){
              $jenis = 'IPV';
            }elseif($imunisasis->jenis_imunisasi == 'bcg'){
              $jenis = 'BCG';
            }elseif($imunisasis->jenis_imunisasi == 'dpthb_1'){
              $jenis = 'DPT/HB 1';
            }elseif($imunisasis->jenis_imunisasi == 'dpthb_2'){
              $jenis = 'DPT/HB 2';
            }elseif($imunisasis->jenis_imunisasi == 'dpthb_3'){
              $jenis = 'DPT/HB 3';
            }elseif($imunisasis->jenis_imunisasi == 'campak_rubela'){
              $jenis = 'Campak-Rubela';
            }elseif($imunisasis->jenis_imunisasi == 'je'){
              $jenis = 'JE';
            }
            $sheet->setCellValue('A'.$row,$nomor++);
            $sheet->setCellValue('B'.$row,$imunisasis->pasien->nama_pasien);
            $sheet->setCellValue('C'.$row,$imunisasis->pasien->tempat_lahir);
            $sheet->setCellValue('D'.$row,$imunisasis->pasien->tgl_lahir);
            $sheet->setCellValue('E'.$row,$imunisasis->pasien->jk_pasien);
            $sheet->setCellValue('F'.$row,$imunisasis->pasien->umur);
            $sheet->setCellValue('G'.$row,$imunisasis->pasien->nama_ortu);
            $sheet->setCellValue('H'.$row,$imunisasis->pasien->alamat);
            $sheet->setCellValue('I'.$row,$imunisasis->tgl_imunisasi);
            $sheet->setCellValue('J'.$row,$jenis);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('download.xlsx');
        return response()->download(public_path('download.xlsx'))->deleteFileAfterSend();
    }

    public function dwlImunisasi($tgl_imunisasi,$jenis_imunisasi){
        $spreadsheet = new Spreadsheet();
        $imunisasi = Imunisasi::where('tgl_imunisasi', 'LIKE', '%'. $tgl_imunisasi .'%')
        ->where('jenis_imunisasi', 'LIKE', '%'. $jenis_imunisasi .'%')
        ->get();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA PASIEN');
        $sheet->setCellValue('C1', 'TEMPAT LAHIR');
        $sheet->setCellValue('D1', 'TANGGAL LAHIR');
        $sheet->setCellValue('E1', 'JENIS KELAMIN BAYI');
        $sheet->setCellValue('F1', 'UMUR');
        $sheet->setCellValue('G1', 'NAMA ORANG TUA');
        $sheet->setCellValue('H1', 'ALAMAT');
        $sheet->setCellValue('I1', 'TANGGAL IMUNISASI');
        $sheet->setCellValue('J1', 'JENIS IMUNISASI');

        $row = 2;
        $nomor = 1;
        foreach($imunisasi as $imunisasis){
            $jenis_imunisasi = '';
            if($imunisasis->jenis_imunisasi == 'hepatitis_b_0'){
              $jenis = 'Hepatitis B 0';
            }elseif($imunisasis->jenis_imunisasi == 'polio_1'){
              $jenis = 'Polio 1';
            }elseif($imunisasis->jenis_imunisasi == 'polio_2'){
              $jenis = 'Polio 2';
            }elseif($imunisasis->jenis_imunisasi == 'polio_3'){
              $jenis = 'Polio 3';
            }elseif($imunisasis->jenis_imunisasi == 'polio_4'){
              $jenis = 'Polio 4';
            }elseif($imunisasis->jenis_imunisasi == 'bcg'){
              $jenis = 'BCG';
            }elseif($imunisasis->jenis_imunisasi == 'dpthb_1'){
              $jenis = 'DPT/HB 1';
            }elseif($imunisasis->jenis_imunisasi == 'dpthb_2'){
              $jenis = 'DPT/HB 2';
            }elseif($imunisasis->jenis_imunisasi == 'dpthb_3'){
              $jenis = 'DPT/HB 3';
            }elseif($imunisasis->jenis_imunisasi == 'campak_rubela'){
              $jenis = 'Campak-Rubela';
            }elseif($imunisasis->jenis_imunisasi == 'je'){
              $jenis = 'JE';
            }
            $sheet->setCellValue('A'.$row,$nomor++);
            $sheet->setCellValue('B'.$row,$imunisasis->pasien->nama_pasien);
            $sheet->setCellValue('C'.$row,$imunisasis->pasien->tempat_lahir);
            $sheet->setCellValue('D'.$row,$imunisasis->pasien->tgl_lahir);
            $sheet->setCellValue('E'.$row,$imunisasis->pasien->jk_pasien);
            $sheet->setCellValue('F'.$row,$imunisasis->pasien->umur);
            $sheet->setCellValue('G'.$row,$imunisasis->pasien->nama_ortu);
            $sheet->setCellValue('H'.$row,$imunisasis->pasien->alamat);
            $sheet->setCellValue('I'.$row,$imunisasis->tgl_imunisasi);
            $sheet->setCellValue('J'.$row,$jenis);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('download.xlsx');
        return response()->download(public_path('download.xlsx'))->deleteFileAfterSend();
    }
}
