<?php

namespace App\Http\Controllers\Kepmas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pasien;
use App\User;
use App\Puskesmas;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Auth;
use Validator;
use Session;
class PasienController extends Controller
{
     public function tambahPasien(){
        $puskesmas = Puskesmas::all();
        return view('kepmas.pasien.tambah-pasien', compact('puskesmas'));
    }
    public function simpanPasien(Request $r){
        $validator = Validator::make($r->all(),[
            'puskesmas_id' =>'required',
            'nama_pasien' =>'required',
            'tempat_lahir' =>'required',
            'tgl_lahir'=>'required',
            'jk_pasien' =>'required',
            'nama_ortu' =>'required',
            'alamat' =>'required',
            'umur' =>'required',
             ]);

        $check = Pasien::where('nama_pasien', '=', $r->nama_pasien)->first();
       
        if(!$validator->fails()){
             $pasien = Pasien::create([
            'puskesmas_id' => $r->puskesmas_id,
            'user_id' => Auth::user()->id,
            'nama_pasien' => $r->nama_pasien,
            'tempat_lahir' =>$r->tempat_lahir,
            'tgl_lahir' =>$r->tgl_lahir,
            'jk_pasien' =>$r->jk_pasien,
            'nama_ortu' =>$r->nama_ortu,
            'alamat' => $r->alamat,
            'umur' => $r->umur,
        ]);

        Session::flash('sukses', 'Pasien baru berhasil ditambahkan');
        return redirect(url('kepmas/pasien/data-pasien'));
    }else{
        Session::flash('error', 'pasien '.$r->nama_pasien.' sudah ada');
        return redirect()->back()->withInput();
        }
    }
	    public function dataPasien(){
	    $pasien = Pasien::all();
	    $users = User::where('id','=',Auth::user()->id)->first();
	    return view('kepmas.pasien.data-pasien', compact('pasien','users'));
	}
        public function editPasien($id){
        $pasien= Pasien::findOrFail($id);
        return view('kepmas.pasien.edit-pasien', compact('pasien'));
    }
        public function updatePasien(Request $r, $id){
        $validator = Validator::make($r->all(),[
            'nama_pasien' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk_pasien' => 'required',
            'nama_ortu' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
        ]);
        if(!$validator->fails()){
        $pasien=  Pasien::findOrFail($id)->update([
            'user_id' => Auth::user()->id,
            'nama_bayi' => $r->nama_bayi,
            'tempat_lahir' =>$r->tempat_lahir,
            'tgl_lahir' =>$r->tgl_lahir,
            'jk_bayi' =>$r->jk_bayi,
            'nama_ortu' =>$r->nama_ortu,
            'alamat' => $r->alamat,
            'umur' => $r->umur,
            ]);

        Session::flash('sukses', 'Data Pasien '.$r->nama_pasien.' berhasil diubah!');
        return redirect(url('kepmas/pasien/data-pasien'));
    }else{
        Session::flash('error', $validator->messages()->first());
        return redirect()->back()->withInput();
    }
}
    public function downloadPasien($user_id){
        $spreadsheet = new Spreadsheet();
        $pasien = Pasien::all();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA PASIEN');
        $sheet->setCellValue('C1', 'TEMPAT LAHIR');
        $sheet->setCellValue('D1', 'TANGGAL LAHIR');
        $sheet->setCellValue('E1', 'JENIS KELAMIN PASIEN');
        $sheet->setCellValue('F1', 'NAMA ORANG TUA');
        $sheet->setCellValue('G1', 'ALAMAT');
        $sheet->setCellValue('H1', 'UMUR');

        $row = 2;
        $nomor = 1;
        foreach($pasien as $pasiens){
            $sheet->setCellValue('A'.$row,$nomor++);
            $sheet->setCellValue('B'.$row,$pasiens->nama_pasien);
            $sheet->setCellValue('C'.$row,$pasiens->tempat_lahir);
            $sheet->setCellValue('D'.$row,$pasiens->tgl_lahir);
            $sheet->setCellValue('E'.$row,$pasiens->jk_pasien);
            $sheet->setCellValue('F'.$row,$pasiens->nama_ortu);
            $sheet->setCellValue('G'.$row,$pasiens->alamat);
            $sheet->setCellValue('G'.$row,$pasiens->umur);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('download.xlsx');
        return response()->download(public_path('download.xlsx'))->deleteFileAfterSend();
    }
}
