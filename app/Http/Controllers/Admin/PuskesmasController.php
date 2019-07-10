<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Puskesmas;
use App\User;
use Auth;
use Validator;
use Session;

class PuskesmasController extends Controller
{
    public function tambahPuskesmas(){
        return view('admin.puskesmas.tambah-puskesmas');
    }

    public function simpanPuskesmas(Request $r){
        $validator = Validator::make($r->all(),[
            'nama' => 'required',
            'alamat' => 'required'
        ]); // validasi data yang di inputkan
        $check = Puskesmas::where('nama', '=', $r->nama)->first();
        if(!$validator->fails()){
            if($check == null){ 
                $puskesmas = Puskesmas::create([
                    'user_id' => Auth::user()->id,
                    'nama' => $r->nama,
                    'alamat' => $r->alamat,
                ]); 
                Session::flash('sukses', 'Puskesmas baru berhasil ditambahkan');
                return redirect(url('admin/puskesmas/data-puskesmas'));
            }else{
                Session::flash('error', 'Puskesmas '.$r->nama.' sudah ada');
                return redirect()->back()->withInput();
            }
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }

    public function dataPuskesmas(){
        $puskesmas = Puskesmas::all();
        return view('admin.puskesmas.data-puskesmas', compact('puskesmas'));
    }

    public function editPuskesmas($id){
        $puskesmas = Puskesmas::findOrFail($id);
        return view('admin.puskesmas.edit-puskesmas', compact('puskesmas'));
    }

    public function updatePuskesmas(Request $r, $id){
        $validator = Validator::make($r->all(),[
            'nama' => 'required',
            'alamat' => 'required'
        ]);
        if(!$validator->fails()){
            if ($r->status == 'aktif') {
                $puskesmas = Puskesmas::findOrFail($id)->update([
                    'user_id' => Auth::user()->id,
                    'nama' => $r->nama,
                    'alamat' => $r->alamat,
                    'status' => 'aktif'
                ]);
            }else{
                $puskesmas = Puskesmas::findOrFail($id)->update([
                    'user_id' => Auth::user()->id,
                    'nama' => $r->nama,
                    'alamat' => $r->alamat,
                    'status' => 'nonaktif'
                ]);
            }
            Session::flash('sukses', 'Data Puskesmas '.$r->nama.' berhasil diubah!');
            return redirect(url('admin/puskesmas/data-puskesmas'));
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }
}
