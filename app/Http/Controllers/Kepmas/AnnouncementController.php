<?php

namespace App\Http\Controllers\Kepmas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\User;
use Image;
use Auth;
use Validator;
use Session;

class AnnouncementController extends Controller
{
    public function tambahAnnouncement(){
        return view('kepmas.announcement.tambah-announcement');
    }

     public function simpanAnnouncement(Request $r){
        $validator = Validator::make($r->all(),[
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $check = Announcement::where('judul', '=', $r->judul)->first();

        if(!$validator->fails()){
           if($check == null){
               if ($r->gambar != null) {
                    $gambar = $r->file('gambar');
                    $filename = time() . '.' . $gambar->getClientOriginalExtension();
                    Image::make($gambar)->resize(800, 800)->save(public_path('/images/pengumuman/'.$filename));
                    $announcement = Announcement::create([
                        'user_id' => Auth::user()->id,
                        'judul' => $r->judul,
                        'gambar' => $filename,
                        'isi' => $r->isi
                    ]);
                    Session::flash('sukses', 'Data Pengumuman '.$r->judul.' berhasil ditambahkan!');
                    return redirect(url('kepmas/announcement/data-announcement'));
                    // dd($r->all());
                }elseif($r->gambar == null){
                    $announcement = Announcement::create([
                        'user_id' => Auth::user()->id,
                        'judul' => $r->judul,
                        'isi' => $r->isi
                    ]);
                    Session::flash('sukses', 'Data Pengumuman '.$r->judul.' berhasil ditambahkan!');
                    return redirect(url('kepmas/announcement/data-announcement'));
                    //dd($r->all());
                }
            }else{
                Session::flash('error', 'Pengumuman '.$r->judul.' sudah ada'); // nampilin alert
                return redirect()->back()->withInput(); //
            }
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }

      public function dataAnnouncement(){
        $announcement = Announcement::all();
        return view('kepmas.announcement.data-announcement', compact('announcement'));
    }

     public function editAnnouncement($id){
        $announcement= Announcement::findOrFail($id);
        return view('kepmas.announcement.edit-announcement', compact('announcement'));
    }

    public function updateAnnouncement(Request $r, $id){
        $validator = Validator::make($r->all(),[
            'judul' => 'required',
            'isi' => 'required',
            'status' => 'required'
        ]);
         if(!$validator->fails()){

            // if ($r->file('gambar')->isValid()) {
                if ($r->gambar != null) {
                    $gambar = $r->file('gambar');
                    $filename = time() . '.' . $gambar->getClientOriginalExtension();
                    $find_img = Announcement::findOrFail($id);
                    unlink(public_path('/images/pengumuman/') . $find_img->gambar);
                    Image::make($gambar)->resize(800, 800)->save(public_path('/images/pengumuman/'.$filename));
                    $announcement = Announcement::findOrFail($id)->update([
                        'judul' => $r->judul,
                        'gambar'=> $filename,
                        'isi' => $r->isi,
                        'status'=> $r->status
                    ]);
                    Session::flash('sukses', 'Data Pengumuman '.$r->judul.' berhasil diubah!');
                    return redirect(url('kepmas/announcement/data-announcement'));
                    // dd($r->all());
                }else{
                    $announcement = Announcement::findOrFail($id)->update([
                        'judul' => $r->judul,
                        'isi' => $r->isi,
                        'status'=> $r->status
                    ]);
                    Session::flash('sukses', 'Data Pengumuman '.$r->judul.' berhasil diubah!');
                    return redirect(url('kepmas/announcement/data-announcement'));
                    //dd($r->all());
                }
            // }
        }else{
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }
}
