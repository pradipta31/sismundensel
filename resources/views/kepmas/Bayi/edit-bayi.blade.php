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
                        <h4 class="card-title">Edit Bayi: {{$bayi->nama_bayi}}</h4>
                        <form class="form p-t-20" action="{{url('kepmas/bayi/'.$bayi->id.'/edit-bayi')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="exampleInputuname">Nama Bayi</label>
                                <div class="input-group">
                                    <input type="text" name="nama_bayi" class="form-control" value="{{$bayi->nama_bayi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" value="{{$bayi->tempat_lahir}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1" value="{{$bayi->tgl_lahir}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin Bayi</label>
                                  <select class="form-control" name="jk_bayi">
                                    <option value="L" {{$bayi->jk_bayi == 'L' ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="P" {{$bayi->jk_bayi == 'P' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Orang Tua</label>
                                <div class="input-group">
                                    <input type="text" name="nama_ortu" class="form-control" id="exampleInputEmail1" value="{{$bayi->nama_ortu}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <div class="input-group">
                                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" value="{{$bayi->alamat}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" value="{{$bayi->status}}">
                                        <option value="hidup" {{$bayi->status == 'hidup' ? 'selected' : ''}}>hidup</option>
                                        <option value="meninggal" {{$bayi->status == 'meninggal' ? 'selected' : ''}}>Meninggal</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Kematian</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_kematian" class="form-control" id="exampleInputEmail1" value="{{$bayi->tgl_kematian}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                <i class="fa fa-check"></i>
                                Simpan
                            </button>
                            <a href="{{url('kepmas/bayi/data-bayi')}}" class="btn btn-info">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection