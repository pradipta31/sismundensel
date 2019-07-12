@extends('layouts.master')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection
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
                        <h4 class="card-title">Tambah Imunisasi</h4>
                        <form class="form p-t-20" action="{{url('admin/imunisasi/tambah-imunisasi')}}"
                        method="post">
                            {{csrf_field()}}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Puskesmas</label>
                                <div class="input-group">
                                    <select class="form-control" id="selectstyle" name="puskesmas_id">
                                        @foreach($puskesmas as $p)
                                            <option value="{{$p->id}}">{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pasien</label>
                                <div class="input-group">
                                    <select class="form-control" id="selectpasien" name="pasien_id">
                                        @foreach($pasiens as $p)
                                            <option value="{{$p->id}}">{{$p->nama_pasien}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Imunisasi</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_imunisasi" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Imunisasi</label>
                                <div class="input-group">
                                    <select class="form-control" id="selectimunisasi" name="jenis_imunisasi">
                                        <option value="hepatitis_b_0">Hepatitis B 0</option>
                                        <option value="polio_1">Polio 1</option>
                                        <option value="polio_2">Polio 2</option>
                                        <option value="polio_3">Polio 3</option>
                                        <option value="polio_4">Polio 4</option>
                                        <option value="ipv"> IPV</option>
                                        <option value="bcg"> BCG</option>
                                        <option value="dpthb_1">DPT/HB 1</option>
                                        <option value="dpthb_2">DPT/HB 2</option>
                                        <option value="dpthb_3">DPT/HB 3</option>
                                        <option value="campak_rubela">Campak-RUbela</option>
                                        <option value="ipv"> JE</option>
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
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#selectstyle').select2();
      $('#selectpasien').select2();
      $('#selectimunisasi').select2();
    });
  </script>
@endsection
