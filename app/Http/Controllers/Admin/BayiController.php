<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bayi;
use App\User;
use App\Puskesmas;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Auth;
use Validator;
use Session;


class BayiController extends Controller
{
    public function tambahBayi(){
        $puskesmas = Puskesmas::all();
        return view('admin.bayi.tambah-bayi', compact('puskesmas'));
    }

   public function simpanBayi(Request $r){
        $validator = Validator::make($r->all(),[
            'puskesmas_id' =>'required',
            'nama_bayi' =>'required',
            'tempat_lahir' =>'required',
            'tgl_lahir'=>'required',
            'jk_bayi' =>'required',
            'nama_ortu' =>'required',
            'alamat' =>'required',
            'status' =>'required',
        ]);
        $check = Bayi::where('nama_bayi', '=', $r->nama_bayi)->first();
        if(!$validator->fails()){
            if ($r->status == 'hidup') {
                if($check == null){
                    $bayi = Bayi::create([
                        'puskesmas_id' => $r->puskesmas_id,
                        'user_id' => Auth::user()->id,
                        'nama_bayi' => $r->nama_bayi,
                        'tempat_lahir' =>$r->tempat_lahir,
                        'tgl_lahir' =>$r->tgl_lahir,
                        'jk_bayi' =>$r->jk_bayi,
                        'nama_ortu' =>$r->nama_ortu,
                        'alamat' => $r->alamat,
                        'status' => $r->status
                    ]);
                    Session::flash('sukses', 'Bayi baru berhasil ditambahkan');
                    return redirect(url('admin/bayi/data-bayi'));
                }else{
                    Session::flash('error', 'bayi '.$r->nama_bayi.' sudah ada');
                    return redirect()->back()->withInput();
                } 
            }elseif($r->status == 'meninggal'){
                if($check == null){
                    $bayi = Bayi::create([
                        'puskesmas_id' => $r->puskesmas_id,
                        'user_id' => Auth::user()->id,
                        'nama_bayi' => $r->nama_bayi,
                        'tempat_lahir' =>$r->tempat_lahir,
                        'tgl_lahir' =>$r->tgl_lahir,
                        'jk_bayi' =>$r->jk_bayi,
                        'nama_ortu' =>$r->nama_ortu,
                        'alamat' => $r->alamat,
                        'status' => $r->status,
                        'tgl_kematian' => $r->tgl_kematian
                    ]);
                    Session::flash('sukses', 'Bayi baru berhasil ditambahkan');
                    return redirect(url('admin/bayi/data-bayi'));
                }else{
                    Session::flash('error', 'bayi '.$r->nama_bayi.' sudah ada');
                    return redirect()->back()->withInput();
                } 
            }
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }
       public function dataBayi(){
        $bayi = Bayi::all();
        $users = User::where('id','=',Auth::user()->id)->first();
        return view('admin.bayi.data-bayi', compact('bayi','users'));
    }

        public function editBayi($id){
        $bayi= Bayi::findOrFail($id);
        return view('admin.bayi.edit-bayi', compact('bayi'));
    }
        public function updateBayi(Request $r, $id){
        $validator = Validator::make($r->all(),[
            'nama_bayi' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk_bayi' => 'required',
            'nama_ortu' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);
         if(!$validator->fails()){
            if ($r->status == 'hidup') {
                $bayi = Bayi::findOrFail($id)->update([
                    'user_id' => Auth::user()->id,
                    'nama_bayi' => $r->nama_bayi,
                    'tempat_lahir' =>$r->tempat_lahir,
                    'tgl_lahir' =>$r->tgl_lahir,
                    'jk_bayi' =>$r->jk_bayi,
                    'nama_ortu' =>$r->nama_ortu,
                    'alamat' => $r->alamat,
                    'status' =>'hidup',
                ]);
            }else{
                 $bayi = Bayi::findOrFail($id)->update([
                    'user_id' => Auth::user()->id,
                    'nama_bayi' => $r->nama_bayi,
                    'tempat_lahir' =>$r->tempat_lahir,
                    'tgl_lahir' =>$r->tgl_lahir,
                    'jk_bayi' =>$r->jk_bayi,
                    'nama_ortu' =>$r->nama_ortu,
                    'alamat' => $r->alamat,
                    'status' =>'meninggal',
                    'tgl_kematian' => $r->tgl_kematian
                ]);
            }
            Session::flash('sukses', 'Data Bayi '.$r->nama.' berhasil diubah!');
            return redirect(url('admin/bayi/data-bayi'));
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }

    public function downloadBayi($user_id){
        $spreadsheet = new Spreadsheet();
        $bayi = Bayi::all();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA BAYI');
        $sheet->setCellValue('C1', 'TEMPAT LAHIR');
        $sheet->setCellValue('D1', 'TANGGAL LAHIR');
        $sheet->setCellValue('E1', 'JENIS KELAMIN BAYI');
        $sheet->setCellValue('F1', 'NAMA ORANG TUA');
        $sheet->setCellValue('G1', 'ALAMAT');
        $sheet->setCellValue('H1', 'STATUS');
        $sheet->setCellValue('I1', 'TANGGAL KEMATIAN');

        $row = 2;
        $nomor = 1;
        foreach($bayi as $bayis){
            $sheet->setCellValue('A'.$row,$nomor++);
            $sheet->setCellValue('B'.$row,$bayis->nama_bayi);
            $sheet->setCellValue('C'.$row,$bayis->tempat_lahir);
            $sheet->setCellValue('D'.$row,$bayis->tgl_lahir);
            $sheet->setCellValue('E'.$row,$bayis->jk_bayi);
            $sheet->setCellValue('F'.$row,$bayis->nama_ortu);
            $sheet->setCellValue('G'.$row,$bayis->alamat);
            $sheet->setCellValue('H'.$row,$bayis->status);
            $sheet->setCellValue('I'.$row,$bayis->tgl_kematian);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('download.xlsx');
        return response()->download(public_path('download.xlsx'))->deleteFileAfterSend();
    }
}
