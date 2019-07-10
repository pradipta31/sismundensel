@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Edit Dokumentasi: {{$dokumentasi->nama_kegiatan}}</h4>
                        <form class="form p-t-20" action="{{url('admin/dokumentasi/'.$dokumentasi->id.'/edit-dokumentasi')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kegiatan</label>
                                <div class="input-group">
                                    <input type="text" name="nama_kegiatan" class="form-control" id="exampleInputEmail1" value="{{$dokumentasi->nama_kegiatan}}">
                                </div>
                            </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal</label>
                                <div class="input-group">
                                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" value="{{$dokumentasi->tanggal}}">
                                </div>
                            </div>
                             <input type="hidden" name="_method" value="put">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Foto</label>
                                <div class="input-group">
                                    <input type="file" name="foto" class="form-control" id="exampleInputEmail1" value="{{$dokumentasi->foto}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" value="{{$dokumentasi->status}}">
                                        <option value="aktif" {{$dokumentasi->status == 'aktif' ? 'selected' : ''}}>Aktif</option>
                                        <option value="nonaktif" {{$dokumentasi->status == 'nonaktif' ? 'selected' : ''}}>Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                <i class="fa fa-check"></i>
                                Simpan
                            </button>
                            <a href="{{url('admin/dokumentasi/data-dokumentasi')}}" class="btn btn-info">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection