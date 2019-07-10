@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Edit Puskesmas : {{$puskesmas->nama}}</h4>
                        <form class="form p-t-20" action="{{url('admin/puskesmas/'.$puskesmas->id.'/edit-puskesmas')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="exampleInputuname">Nama Puskesmas</label>
                                <div class="input-group">
                                    <input type="text" name="nama" class="form-control" value="{{$puskesmas->nama}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <div class="input-group">
                                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" value="{{$puskesmas->alamat}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" value="{{$puskesmas->status}}">
                                        <option value="aktif" {{$puskesmas->status == 'aktif' ? 'selected' : ''}}>Aktif</option>
                                        <option value="nonaktif" {{$puskesmas->status == 'nonaktif' ? 'selected' : ''}}>Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                <i class="fa fa-check"></i>
                                Simpan
                            </button>
                            <a href="{{url('admin/puskesmas/data-puskesmas')}}" class="btn btn-info">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection