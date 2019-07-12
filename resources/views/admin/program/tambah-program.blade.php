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
                        <h4 class="card-title">Tambah Program Imunisasi</h4>
                        <form class="form p-t-20" action="{{url('admin/program/tambah-program')}}" 
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
                                <label for="exampleInputuname">Nama Sekolah</label>
                                <div class="input-group">
                                     <select class="form-control" name="nama_sekolah">
                                        <option value="SD 1 Sanur">SD 1 Sanur</option>
                                        <option value="SD 2 Sanur">SD 2 Sanur</option>
                                        <option value="SD 3 Sanur">SD 3 Sanur</option>
                                        <option value="SD 4 Sanur">SD 4 Sanur</option>
                                        <option value="SD 5 Sanur">SD 5 Sanur</option>
                                        <option value="SD 6 Sanur">SD 6 Sanur</option>
                                        <option value="SD 8 Sanur">SD 8 Sanur</option>
                                        <option value="SD 10 Sanur">SD 10 Sanur</option>
                                        <option value="SD 11 Sanur">SD 11 Sanur</option>
                                        <option value="SD 12 Sanur">SD 12 Sanur</option>
                                        <option value="SSD Bali Island School">SD Bali Island School</option>
                                        <option value="SDS Bina Tunas">SDS Bina Tunas</option>
                                        <option value="SD DOremi Excellent School">SD DOremi Excellent School</option>
                                        <option value="SSD Gandhi Memorial Intercontinental School Bali">SD Gandhi Memorial Intercontinental School Bali</option>
                                        <option value="SD 1 Renon">SD 1 Renon</option>
                                        <option value="SD 3 Renon">SD 3 Renon</option>
                                        <option value="SD Hainan School">SD Hainan School</option>
                                        <option value="SD Petra Berkat">SD Petra Berkat</option>
                                        <option value="SD Sanur Independent School">SD Sanur Independent School</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Imunisasi</label>
                                <div class="input-group">
                                    <input type="date" name="tanggal_imunisasi" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Siswa</label>
                                <div class="input-group">
                                    <input type="text" name="jumlah_siswa" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Imunisasi</label>
                                <div class="input-group">
                                    <input type="text" name="jumlah_imunisasi" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Imunisasi</label>
                                <div class="input-group">
                                    <select class="form-control" name="jenis_imunisasi">
                                        <option value="Polio 1">Polio 1</option>
                                        <option value="Polio 2">Polio 2</option>
                                        <option value="Polio 3">Polio 3</option>
                                        <option value="Polio 4">Polio 4</option>
                                        <option value="BCG"> BCG</option>
                                        <option value="IPV"> IPV</option>
                                        <option value="DPT/HB 1">DPT/HB 1</option>
                                        <option value="DPT/HB 2">DPT/HB 2</option>
                                        <option value="DPT/HB 3">DPT/HB 3</option>
                                        <option value="M-R">M-R</option>
                                        <option value="JE">JE</option>
                                    </select>
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