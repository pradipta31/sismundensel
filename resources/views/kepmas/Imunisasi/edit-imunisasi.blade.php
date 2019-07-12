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
                        <h4 class="card-title">Edit Imunisasi: {{$imunisasi->nama_pasien}}</h4>
                        <form class="form p-t-20" action="{{url('kepmas/imunisasi/'.$imunisasi->id.'/edit-imunisasi')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Puskesmas</label>
                                <div class="input-group">
                                    <select class="form-control" name="puskesmas_id">
                                        @foreach($puskesmas as $p)
                                            <option value="{{$p->id}}" {{$p->id == $p->id ? '' : ''}}>{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                      
                            <div class="form-group">
                                <label for="exampleInputuname">Nama  Pasien</label>
                                <div class="input-group">
                                    <input type="text" name="nama_pasien" class="form-control" value="{{$imunisasi->nama_pasien}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" value="{{$imunisasi->tempat_lahir}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1" value="{{$imunisasi->tgl_lahir}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin Bayi</label>
                                  <select class="form-control" name="jk_bayi">
                                    <option value="L" {{$imunisasi->jk_bayi == 'L' ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="P" {{$imunisasi->jk_bayi == 'P' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Umur</label>
                                <div class="input-group">
                                    <input type="text" name="umur" class="form-control" id="exampleInputEmail1" value="{{$imunisasi->umur}}">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Orang Tua</label>
                                <div class="input-group">
                                    <input type="text" name="nama_orangtua" class="form-control" id="exampleInputEmail1" value="{{$imunisasi->nama_orangtua}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <div class="input-group">
                                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" value="{{$imunisasi->alamat}}">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Imunisasi</label>
                                <div class="input-group">
                                 <input type="date" name="tgl_imunisasi" class="form-control" id="exampleInputEmail1" value="{{$imunisasi->tgl_imunisasi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Imunisasi</label>
                                <div class="input-group">
                                    <select class="form-control" name="jenis_imunisasi" value="{{$imunisasi->jenis_imunisasi}}">
                                        <option value="Hepatitis B 0" {{$imunisasi->jenis_imunisasi == 'Hepatitis B 0' ? 'selected' : ''}}>Hepatitis B 0</option>
                                         <option value="Polio 1" {{$imunisasi->jenis_imunisasi == 'Polio 1' ? 'selected' : ''}}>Polio 1
                                        </option>
                                         <option value="Polio 2" {{$imunisasi->jenis_imunisasi == 'Polio 2' ? 'selected' : ''}}>Polio 2
                                        </option>
                                         <option value="Polio 3" {{$imunisasi->jenis_imunisasi == 'Polio 3' ? 'selected' : ''}}>Polio 3
                                        </option>
                                         <option value="Polio 4" {{$imunisasi->jenis_imunisasi == 'Polio 4' ? 'selected' : ''}}>Polio 4
                                        </option>
                                        <option value="IPV" {{$imunisasi->jenis_imunisasi == 'IPV' ? 'selected' : ''}}>IPV</option>
                                        <option value="BCG" {{$imunisasi->jenis_imunisasi == 'BCG' ? 'selected' : ''}}>BCG
                                        </option>
                                         <option value="DPT/HB 1" {{$imunisasi->jenis_imunisasi == 'DPT/HB 1' ? 'selected' : ''}}>DPT/HB 1
                                        </option>
                                         <option value="DPT/HB 2" {{$imunisasi->jenis_imunisasi == 'DPT/HB 2' ? 'selected' : ''}}>DPT/HB 2
                                        </option>
                                         <option value="DPT/HB 3" {{$imunisasi->jenis_imunisasi == 'DPT/HB 3' ? 'selected' : ''}}>DPT/HB 3
                                        </option>
                                        <option value="Campak-Rubela" {{$imunisasi->jenis_imunisasi == 'Campak-Rubela' ? 'selected' : ''}}>Campak-Rubela
                                        </option>
                                         <option value="je" {{$imunisasi->jenis_imunisasi == 'Campak-Rubela' ? 'selected' : ''}}>JE
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                <i class="fa fa-check"></i>
                                Simpan
                            </button>
                            <a href="{{url('kepmas/imunisasi/data-imunisasi')}}" class="btn btn-info">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection