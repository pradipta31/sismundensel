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
                        <h4 class="card-title">Edit Imunisasi: {{$imunisasi->pasien->nama_pasien}}</h4>
                        <form class="form p-t-20" action="{{url('admin/imunisasi/'.$imunisasi->id.'/edit-imunisasi')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="pasien_id" value="{{$imunisasi->pasien_id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Puskesmas</label>
                                <div class="input-group">
                                    <select class="form-control" name="puskesmas_id" id="selectpuskesmas" value="{{$imunisasi->puskesmas_id}}" disabled>
                                        @foreach($puskesmas as $p)
                                            <option value="{{$p->id}}" {{$imunisasi->puskesmas_id == $p->id ? 'selected' : ''}}>{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pasien</label>
                                <div class="input-group">
                                    <select class="form-control" id="selectpasien" name="pasien_id" value="{{$imunisasi->pasien_id}}" disabled>
                                        @foreach($pasiens as $p)
                                            <option value="{{$p->id}}" {{$imunisasi->pasien_id == $p->id ? 'selected' : ''}}>{{$p->nama_pasien}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Imunisasi</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_imunisasi" class="form-control" id="exampleInputEmail1" value="{{$imunisasi->tgl_imunisasi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Imunisasi</label>
                                <div class="input-group">
                                    <select class="form-control" id="selectimunisasi" name="jenis_imunisasi" value="{{$imunisasi->jenis_imunisasi}}">
                                        <option value="hepatitis_b_0" {{$imunisasi->jenis_imunisasi == 'hepatitis_b_0' ? 'selected' : ''}}>Hepatitis B 0</option>
                                        <option value="polio_1" {{$imunisasi->jenis_imunisasi == 'polio_1' ? 'selected' : ''}}>Polio 1</option>
                                        <option value="polio_2" {{$imunisasi->jenis_imunisasi == 'polio_2' ? 'selected' : ''}}>Polio 2</option>
                                        <option value="polio_3" {{$imunisasi->jenis_imunisasi == 'polio_3' ? 'selected' : ''}}>Polio 3</option>
                                        <option value="polio_4" {{$imunisasi->jenis_imunisasi == 'polio_4' ? 'selected' : ''}}>Polio 4</option>
                                         <option value="ipv" {{$imunisasi->jenis_imunisasi == 'ipv' ? 'selected' : ''}}> IPV</option>
                                        <option value="bcg" {{$imunisasi->jenis_imunisasi == 'bcg' ? 'selected' : ''}}> BCG</option>
                                        <option value="dpthb_1" {{$imunisasi->jenis_imunisasi == 'dpthb_1' ? 'selected' : ''}}>DPT/HB 1</option>
                                        <option value="dpthb_2" {{$imunisasi->jenis_imunisasi == 'dpthb_2' ? 'selected' : ''}}>DPT/HB 2</option>
                                        <option value="dpthb_3" {{$imunisasi->jenis_imunisasi == 'dpthb_3' ? 'selected' : ''}}>DPT/HB 3</option>
                                        <option value="campak_rubela" {{$imunisasi->jenis_imunisasi == 'campak' ? 'selected' : ''}}>Campak-Rubela</option>
                                        <option value="je" {{$imunisasi->jenis_imunisasi == 'je' ? 'selected' : ''}}> JE</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                <i class="fa fa-check"></i>
                                Simpan
                            </button>
                            <a href="{{url('admin/imunisasi/data-imunisasi')}}" class="btn btn-info">Kembali</a>
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
    $('#selectpuskesmas').select2();
    $('#selectpasien').select2();
    $('#selectimunisasi').select2();
  });
</script>
@endsection
