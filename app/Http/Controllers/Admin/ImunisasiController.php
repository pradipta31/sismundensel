<?php

namespace App\Http\Controllers\Admin;
use Validator;
use Session;
use Auth;
use DB;
use App\User;
use App\Puskesmas;
use App\Imunisasi;
use App\JenisImunisasi;
use App\Pasien;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImunisasiController extends Controller
{
    public function tambahImunisasi(){
        $puskesmas = Puskesmas::where('status','aktif')->get();
        $pasiens = Pasien::all();
        return view('admin.imunisasi.tambah-imunisasi',compact('puskesmas','pasiens'));
    }

    public function SimpanImunisasi(Request $r){
        $validator = Validator::make($r->all(),[
            'puskesmas_id' =>'required',
            'pasien_id' =>'required',
            'tgl_imunisasi' => 'required',
            'jenis_imunisasi' =>'required'
        ]);
        $pasien = Pasien::where('id',$r->pasien_id)->first();
        $jenis = $r->jenis_imunisasi;
        if (!$validator->fails()) {
            $imunisasi = Imunisasi::create([
                'user_id' => Auth::user()->id,
                'puskesmas_id' => $r->puskesmas_id,
                'pasien_id' => $r->pasien_id,
                'tgl_imunisasi' => $r->tgl_imunisasi,
                'jenis_imunisasi' => $jenis
            ]);

            $check_jenis = JenisImunisasi::where('pasien_id',$r->pasien_id)->first();
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
            return redirect('admin/imunisasi/data-imunisasi');
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }


     public function dataImunisasi(){
        $imunisasi = Imunisasi::all();
        $users = User::where('id','=',Auth::user()->id)->first();
        return view('admin.imunisasi.data-imunisasi', compact('imunisasi','users'));
    }

    public function getRiwayat($id){
        $imunisasi = Imunisasi::where('pasien_id',$id)->first();

        $imunisasi_p = JenisImunisasi::where('pasien_id',$imunisasi->pasien_id)->get();
        return view('admin.imunisasi.riwayat',compact('imunisasi','imunisasi_p'));
    }

    public function editImunisasi($id){
        $puskesmas = Puskesmas::all();
        $pasiens = Pasien::all();
        $imunisasi= Imunisasi::where('id',$id)->first();
        return view('admin.imunisasi.edit-imunisasi', compact('imunisasi', 'puskesmas', 'pasiens'));
    }

    public function updateImunisasi(Request $r, $id){
      $validator = Validator::make($r->all(),[
          'tgl_imunisasi' => 'required',
          'jenis_imunisasi' =>'required'
      ]);
      $imunisasi_check = Imunisasi::where('id',$id)->first();
      $pasien_id = $imunisasi_check->pasien_id;
      $jenis = $r->jenis_imunisasi;
      if ($imunisasi_check->jenis_imunisasi == 'hepatitis_b_0') {
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'hepatitis_b_0' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'polio_1'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'polio_1' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'polio_2'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'polio_2' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'polio_3'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'polio_3' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'polio_4'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'polio_4' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'ipv'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'ipv' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'bcg'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'bcg' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'dpthb_1'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'dpthb_1' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'dpthb_2'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'dpthb_2' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'dpthb_3'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'dpthb_3' => null
          ]);
      }elseif($imunisasi_check->jenis_imunisasi == 'campak_rubela'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'campak_rubela' => null
          ]);
        }elseif($imunisasi_check->jenis_imunisasi == 'je'){
          $jenisI = JenisImunisasi::where('pasien_id',$pasien_id)->update([
              'je' => null
          ]);
      }
      if (!$validator->fails()) {
          $imunisasi = Imunisasi::where('id',$id)->update([
              'tgl_imunisasi' => $r->tgl_imunisasi,
              'jenis_imunisasi' => $jenis
          ]);

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
          Session::flash('sukses', 'Data imunisasi berhasil disimpan');
          return redirect('admin/imunisasi/data-imunisasi');
      }else{
          Session::flash('error', $validator->messages()->first());
          return redirect()->back()->withInput();
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
            }elseif($imunisasis->jenis_imunisasi == 'JE'){
              $jenis = 'je';
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

