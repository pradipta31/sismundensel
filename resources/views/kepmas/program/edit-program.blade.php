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
                        <h4 class="card-title">Edit Program Imunisasi: {{$programsekolah->nama_sekolah}}</h4>
                        <form class="form p-t-20" action="{{url('kepmas/program/'.$programsekolah->id.'/edit-program')}}" method="post">
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
                                <label>Nama Sekolah</label>
                                <div class="input-group">               
                                    <select class="form-control" name="nama_sekolah" value="{{$programsekolah->nama_sekolah}}">
                                    <option value="SD 1 Sanur" {{$programsekolah->nama_sekolah == 'SD 1 Sanur' ? 'selected' : ''}}>SD 1 Sanur
                                    </option>
                                    <option value="SD 2 Sanur" {{$programsekolah->nama_sekolah == 'SD 2 Sanur' ? 'selected' : ''}}>SD 2 Sanur
                                    </option>
                                    <option value="SD 3 Sanur" {{$programsekolah->nama_sekolah == 'SD 3 Sanur' ? 'selected' : ''}}>SD 3 Sanur
                                    </option>
                                    <option value="SD 4 Sanur" {{$programsekolah->nama_sekolah == 'SD 4 Sanur' ? 'selected' : ''}}>SD 4 Sanur
                                    </option>
                                    <option value="SD 5 Sanur" {{$programsekolah->nama_sekolah == 'SD 5 Sanur' ? 'selected' : ''}}>SD 5 Sanur
                                    </option>
                                    <option value="SD 6 Sanur" {{$programsekolah->nama_sekolah == 'SD 6 Sanur' ? 'selected' : ''}}>SD 6 Sanur
                                    </option>
                                    <option value="SD 8 Sanur" {{$programsekolah->nama_sekolah == 'SD 8 Sanur' ? 'selected' : ''}}>SD 8 Sanur
                                    </option>
                                    <option value="SD 10 Sanur" {{$programsekolah->nama_sekolah == 'SD 10 Sanur' ? 'selected' : ''}}>SD 10 Sanur
                                    </option>
                                    <option value="SD 11 Sanur" {{$programsekolah->nama_sekolah == 'SD 11 Sanur' ? 'selected' : ''}}>SD 11 Sanur
                                    </option>
                                    <option value="SD 12 Sanur" {{$programsekolah->nama_sekolah == 'SD 12 Sanur' ? 'selected' : ''}}>SD 12 Sanur
                                    </option>
                                    <option value="SD Bali Island School" {{$programsekolah->nama_sekolah == 'SD Bali Island School' ? 'selected' : ''}}>SD Bali Island School
                                    </option>
                                    <option value="SDS Bina Tunas" {{$programsekolah->nama_sekolah == 'SDS Bina Tunas' ? 'selected' : ''}}>SDS Bina Tunas
                                    </option>
                                    <option value="SD DOremi Excellent School" {{$programsekolah->nama_sekolah == 'SD DOremi Excellent School' ? 'selected' : ''}}>SD DOremi Excellent School
                                    </option>
                                    <option value="SD Gandhi Memorial Intercontinental School Bali" {{$programsekolah->nama_sekolah == 'SD Gandhi Memorial Intercontinental School Bali' ? 'selected' : ''}}>SD Gandhi Memorial Intercontinental School Bali
                                    </option>
                                    <option value="SD 1 Renon" {{$programsekolah->nama_sekolah == 'SD 1 Renon' ? 'selected' : ''}}>SD 1 Renon
                                    </option>
                                    <option value="SD 3 Renon" {{$programsekolah->nama_sekolah == 'SD 3 Renon' ? 'selected' : ''}}>SD 3 Renon
                                    </option>
                                    <option value="SD Hainan School" {{$programsekolah->nama_sekolah == 'SD Hainan School' ? 'selected' : ''}}>SD Hainan School
                                    </option>
                                    <option value="SD Petra Berkat" {{$programsekolah->nama_sekolah == 'SD Petra Berkat' ? 'selected' : ''}}>SD Petra Berkat
                                    </option>
                                    <option value="SD Sanur Independent School" {{$programsekolah->nama_sekolah == 'SD Sanur Independent School' ? 'selected' : ''}}>SD Sanur Independent School
                                    </option>
                                    <option value="SD Saraswati 4" {{$programsekolah->nama_sekolah == 'SD Saraswati 4' ? 'selected' : ''}}>SD Saraswati 4
                                    </option>

                                    </select>
                                </div>
                             </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Imunisasi</label>
                                <div class="input-group">
                                    <input type="date" name="tanggal_imunisasi" class="form-control" id="exampleInputEmail1" value="{{$programsekolah->tanggal_imunisasi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Siswa</label>
                                <div class="input-group">
                                    <input type="text" name="jumlah_siswa" class="form-control" id="exampleInputEmail1" value="{{$programsekolah->jumlah_siswa}}">
                                </div>
                                </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Imunisasi</label>
                                <div class="input-group">
                                    <input type="text" name="jumlah_imunisasi" class="form-control" id="exampleInputEmail1" value="{{$programsekolah->jumlah_imunisasi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Imunisasi</label>
                                <div class="input-group">
                                    <select class="form-control" name="jenis_imunisasi" value="{{$programsekolah->jenis_imunisasi}}">
                                        <option value="HB 0" {{$programsekolah->jenis_imunisasi == 'HB 0' ? 'selected' : ''}}>HB 0</option>
                                        <option value="BCG" {{$programsekolah->jenis_imunisasi == 'BCG' ? 'selected' : ''}}>BCG
                                        </option>
                                         <option value="Polio 1" {{$programsekolah->jenis_imunisasi == 'Polio 1' ? 'selected' : ''}}>Polio 1
                                        </option>
                                         <option value="Polio 2" {{$programsekolah->jenis_imunisasi == 'Polio 2' ? 'selected' : ''}}>Polio 2
                                        </option>
                                         <option value="Polio 3" {{$programsekolah->jenis_imunisasi == 'Polio 3' ? 'selected' : ''}}>Polio 3
                                        </option>
                                         <option value="Polio 4" {{$programsekolah->jenis_imunisasi == 'Polio 4' ? 'selected' : ''}}>Polio 4
                                        </option>
                                         <option value="DPT/HB 1" {{$programsekolah->jenis_imunisasi == 'DPT/HB 1' ? 'selected' : ''}}>DPT/HB 1
                                        </option>
                                         <option value="DPT/HB 2" {{$programsekolah->jenis_imunisasi == 'DPT/HB 2' ? 'selected' : ''}}>DPT/HB 2
                                        </option>
                                         <option value="DPT/HB 3" {{$programsekolah->jenis_imunisasi == 'DPT/HB 3' ? 'selected' : ''}}>DPT/HB 3
                                        </option>
                                        <option value="M-R" {{$programsekolah->jenis_imunisasi == 'M-R' ? 'selected' : ''}}>M-R
                                        </option>
                                         <option value="JE" {{$programsekolah->jenis_imunisasi == 'JE' ? 'selected' : ''}}>JE
                                        </option>


                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                <i class="fa fa-check"></i>
                                Simpan
                            </button>
                            <a href="{{url('kepmas/program/data-program')}}" class="btn btn-info">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection