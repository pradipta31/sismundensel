@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Edit Pengumuman: {{$announcement->judul}}</h4>
                        <form class="form p-t-20" action="{{url('kepmas/announcement/'.$announcement->id.'/edit-announcement')}}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <div class="input-group">
                                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1" value="{{$announcement->judul}}">
                                </div>
                            </div>
                             <input type="hidden" name="_method" value="put">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Gambar</label>
                                <div class="input-group">
                                    <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" value="{{$announcement->gambar}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Isi</label>
                                <div class="input-group">
                                    <input type="text" name="isi" class="form-control" id="exampleInputEmail1" value="{{$announcement->isi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" value="{{$announcement->status}}">
                                        <option value="aktif" {{$announcement->status == 'aktif' ? 'selected' : ''}}>Aktif</option>
                                        <option value="nonaktif" {{$announcement->status == 'nonaktif' ? 'selected' : ''}}>Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                <i class="fa fa-check"></i>
                                Simpan
                            </button>
                            <a href="{{url('kepmas/announcement/data-announcement')}}" class="btn btn-info">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection