<?php

namespace App\Http\Controllers\Admin;
use Validator;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Puskesmas;
use App\ProgramSekolah;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ProgramSekolahController extends Controller
{
     public function tambahProgramSekolah(){
    	$puskesmas = Puskesmas::all();
        return view('admin.program.tambah-program', compact('puskesmas'));
    }
    public function SimpanProgramSekolah(Request $r){
        $validator = Validator::make($r->all(),[
        	'puskesmas_id' =>'required',
            'nama_sekolah' =>'required',
            'tanggal_imunisasi' =>'required',
            'jumlah_siswa'=>'required',
            'jumlah_imunisasi' =>'required',
            'jenis_imunisasi' =>'required',
        ]);

         $jenis = ProgramSekolah::where('nama_sekolah', '=', $r->nama_sekolah)->first();

        if(!$validator->fails()){
            $programsekolah = ProgramSekolah::create([
                'user_id' => Auth::user()->id,
                'puskesmas_id' => $r->puskesmas_id,
                'nama_sekolah' => $r->nama_sekolah,
                'tanggal_imunisasi' =>$r->tanggal_imunisasi,
                'jumlah_siswa'=>$r->jumlah_siswa,
                'jumlah_imunisasi' =>$r->jumlah_imunisasi,
                'jenis_imunisasi' =>$r->jenis_imunisasi,
            ]);

            Session::flash('sukses', 'Data program sekolah berhasil disimpan');
                return redirect('admin/program/data-program');  
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }
     public function dataProgramSekolah(){
        $programsekolah = ProgramSekolah::all();
        $users = User::where('id','=',Auth::user()->id)->first();
        return view('admin.program.data-program', compact('programsekolah','users'));
    }

     public function editProgramSekolah($id){
        $puskesmas = Puskesmas::all();
        $programsekolah=ProgramSekolah::findOrFail($id);
        return view('admin.program.edit-program', compact('programsekolah', 'puskesmas'));
    }

    public function updateProgramSekolah(Request $r, $id){
        $validator = Validator::make($r->all(),[
           'puskesmas_id' =>'required',
            'nama_sekolah' =>'required',
            'tanggal_imunisasi' =>'required',
            'jumlah_siswa'=>'required',
            'jumlah_imunisasi' =>'required',
            'jenis_imunisasi' =>'required',
        ]);
        if(!$validator->fails()){
            $programsekolah=  ProgramSekolah::findOrFail($id)->update([
                'user_id' => Auth::user()->id,
               'puskesmas_id' => $r->puskesmas_id,
                'nama_sekolah' => $r->nama_sekolah,
                'tanggal_imunisasi' =>$r->tanggal_imunisasi,
                'jumlah_siswa'=>$r->jumlah_siswa,
                'jumlah_imunisasi' =>$r->jumlah_imunisasi,
                'jenis_imunisasi' =>$r->jenis_imunisasi,
            ]);

            Session::flash('sukses', 'Data Program Sekolah berhasil diubah');
                return redirect('admin/program/data-program');  
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }
    public function downloadProgramSekolah($user_id){
        $spreadsheet = new Spreadsheet();
        $programsekolah= ProgramSekolah::all();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA SEKOLAH');
        $sheet->setCellValue('C1', 'TANGGAL IMUNISASI');
        $sheet->setCellValue('D1', 'JUMLAH SISWA');
        $sheet->setCellValue('E1', 'JUMLAH IMUNISASI');
        $sheet->setCellValue('F1', 'JENIS IMUNISASI');

        $row = 2;
        $nomor = 1;
        foreach($programsekolah as $programsekolah){
            $sheet->setCellValue('A'.$row,$nomor++);
            $sheet->setCellValue('B'.$row,$programsekolah->nama_sekolah);
            $sheet->setCellValue('C'.$row,$programsekolah->tanggal_imunisasi);
            $sheet->setCellValue('D'.$row,$programsekolah->jumlah_siswa);
            $sheet->setCellValue('E'.$row,$programsekolah->jumlah_imunisasi);
            $sheet->setCellValue('F'.$row,$programsekolah->jenis_imunisasi);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('download.xlsx');
        return response()->download(public_path('download.xlsx'))->deleteFileAfterSend();
    }
}