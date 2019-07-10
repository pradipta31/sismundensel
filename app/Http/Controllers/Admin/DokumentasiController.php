<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dokumentasi;
use App\User;
use Image;
use Auth;
use Validator;
use Session;

class DokumentasiController extends Controller
{
    public function tambahDokumentasi(){
    return view('admin.dokumentasi.tambah-dokumentasi');
}

public function simpanDokumentasi(Request $r){
        $validator = Validator::make($r->all(),[
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|image|max:5000|mimes:jpeg,jpg,png',
        ]);
                $check = Dokumentasi::where('nama_kegiatan', '=', $r->nama_kegiatan)->first(); // cek data puskesmas apakah ada atau belum
        if(!$validator->fails()){
            if($check == null){
                $foto = $r->file('foto');
                $filename = time() . '.' . $foto->getClientOriginalExtension();
                if ($r->file('foto')->isValid()) {
                    Image::make($foto)->resize(800, 800)->save(public_path('/images/dokumentasi/'.$filename));
                    $dokumentasi = Dokumentasi::create([
                        'user_id' => Auth::user()->id,
                        'nama_kegiatan' => $r->nama_kegiatan,
                        'tanggal'=> $r->tanggal,
                        'foto'=> $filename,
                    ]);
                    Session::flash('sukses', 'Dokumentasi baru berhasil ditambahkan'); // nampilin alert
                    return redirect(url('admin/dokumentasi/data-dokumentasi')); // langsung menuju ke halaman data puskesmas
                }
            }else{
                Session::flash('error', 'Dokumentasi'.$r->nama_kegiatan.' sudah ada'); // nampilin alert
                return redirect()->back()->withInput(); // 
            }
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }
    public function dataDokumentasi(){
        $dokumentasi = Dokumentasi::all();
        return view('admin.dokumentasi.data-dokumentasi', compact('dokumentasi'));
    }

     public function editDokumentasi($id){
        $dokumentasi= Dokumentasi::findOrFail($id);
        return view('admin.dokumentasi.edit-dokumentasi', compact('dokumentasi'));
    }

    public function updateDokumentasi(Request $r, $id){
        $validator = Validator::make($r->all(),[
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);
         if(!$validator->fails()){
            
            // if ($r->file('foto')->isValid()) {
                if ($r->foto != null) {
                    $foto = $r->file('foto');
                    $filename = time() . '.' . $foto->getClientOriginalExtension();
                    Image::make($foto)->resize(800, 800)->save(public_path('/images/dokumentasi/'.$filename));
                    $dokumentasi = Dokumentasi::findOrFail($id)->update([
                        'nama_kegiatan' => $r->nama_kegiatan,
                        'tanggal' => $r->tanggal,
                        'foto' => $filename,
                        'status'=> $r->status
                    ]);
                    Session::flash('sukses', 'Data Dokumentasi '.$r->nama_kegiatan.' berhasil diubah!');
                    return redirect(url('admin/dokumentasi/data-dokumentasi'));
                    // dd($r->all());
                }else{
                    $dokumentasi = Dokumentasi::findOrFail($id)->update([
                        'nama_kegiatan' => $r->nama_kegiatan,
                        'tanggal' => $r->tanggal,
                        'status'=> $r->status
                    ]);
                    Session::flash('sukses', 'Data Dokumentasi '.$r->nama_kegiatan.' berhasil diubah!');
                    return redirect(url('admin/dokumentasi/data-dokumentasi'));
                    //dd($r->all());
                }
            // }
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }

}
