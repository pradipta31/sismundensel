@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div style="margin-top: 10px">
                @if(Session::has('sukses'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                        <h4><i class="fa fa-check"></i> Information !</h4>
                        {{Session::get('sukses')}}
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                        <h4><i class="fa fa-check"></i> Information !</h4>
                        {{Session::get('error')}}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Edit Pasien: {{$pasien->nama_pasien}}</h4>
                        <form class="form p-t-20" action="{{url('admin/pasien/'.$pasien->id.'/edit-pasien')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="exampleInputuname">Nama Pasien</label>
                                <div class="input-group">
                                    <input type="text" name="nama_pasien" class="form-control" value="{{$pasien->nama_pasien}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" value="{{$pasien->tempat_lahir}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1" value="{{$pasien->tgl_lahir}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin Pasien</label>
                                  <select class="form-control" name="jk_pasien">
                                    <option value="L" {{$pasien->jk_pasien == 'L' ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="P" {{$pasien->jk_pasien == 'P' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Orang Tua</label>
                                <div class="input-group">
                                    <input type="text" name="nama_ortu" class="form-control" id="exampleInputEmail1" value="{{$pasien->nama_ortu}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <div class="input-group">
                                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" value="{{$pasien->alamat}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Umur</label>
                                <div class="input-group">
                                    <input type="text" name="umur" class="form-control" id="exampleInputEmail1" value="{{$pasien->umur}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                <i class="fa fa-check"></i>
                                Simpan
                            </button>
                            <a href="{{url('admin/pasien/data-pasien')}}" class="btn btn-info">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection