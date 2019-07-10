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
                        <h4 class="card-title">Tambah Pasien</h4>
                        <form class="form p-t-20" action="{{url('admin/pasien/tambah-pasien')}}" 
                        method="post">
                            {{csrf_field()}}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Puskesmas</label>
                                <div class="input-group">
                                    <select class="form-control" name="puskesmas_id">
                                        @foreach($puskesmas as $p)
                                            <option value="{{$p->id}}">{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="exampleInputuname">Nama Pasien</label>
                                <div class="input-group">
                                    <input type="text" name="nama_pasien" class="form-control" id="exampleInputuname" placeholder="Nama Pasien">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputuname">Tempat Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat_lahir" class="form-control" id="exampleInputuname" placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <div class="input-group">
                                    <select class="form-control" name="jk_pasien">
                                        <option value="L">Laki-laki</option>
                                         <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Orang Tua</label>
                                <div class="input-group">
                                    <input type="text" name="nama_ortu" class="form-control" id="exampleInputEmail1" placeholder="Nama Orang Tua">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <div class="input-group">
                                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Umur</label>
                                <div class="input-group">
                                    <input type="text" name="umur" class="form-control" id="exampleInputEmail1" placeholder="Umur">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                <i class="fa fa-check"></i>
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 