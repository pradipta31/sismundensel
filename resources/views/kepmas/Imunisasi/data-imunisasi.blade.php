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
			<div class="card">
		        <div class="card-body">
		            <h4 class="card-title">Data Imunisasi</h4>
		            <a href="{{url('kepmas/imunisasi/cetak-imunisasi/'.$users->id)}}" class="btn btn-primary">Cetak Data</a>
		            <p>
		            	<form>
		            		<div class="row">
		            			<div class="col-lg-4">
			            			<div class="form-group">
					            		<label>Tanggal Imunisasi</label>
					            		<input type="date" name="tgl_imunisasi" class="form-control">
					            	</div>
			            		</div>
				            	<div class="col-lg-4">
				            		<div class="form-group">
					            		<label>Jenis Imunisasi</label>
					            		<div class="input-group">
		                                    <select class="form-control" name="jenis_imunisasi">
		                                        <option value="hepatitis_b_0">Hepatitis B 0</option>
		                                        <option value="polio_1">Polio 1</option>
		                                        <option value="polio_2">Polio 2</option>
		                                        <option value="polio_3">Polio 3</option>
		                                        <option value="polio_4">Polio 4</option>
				                                <option value="bcg"> BCG</option>
				                                <option value="dpthb_1">DPT/HB 1</option>
				                                <option value="dpthb_2">DPT/HB 2</option>
				                                <option value="dpthb_3">DPT/HB 3</option>
				                                <option value="campak">Campak</option>
		                                    </select>
		                                </div>
					            	</div>
				            	</div>
				            	<div class="col-lg-4">
				            		<div class="form-group">
				            			<button type="submit" class="btn btn-primary" style="margin-top: 30px">Cari</button>
				            		</div>
				            	</div>
		            		</div>
		            	</form>
		            </p>
                            <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                            <thead>
		                        <tr>
		                            <th style="text-align: center" width="20px">No</th>
		                            <th style="text-align: center">Admin</th>
		                            <th style="text-align: center">Puskesmas</th>
		                            <th style="text-align: center">Nama Pasien</th>
		                            <th style="text-align: center">Tanggal Lahir</th>
		                            <th style="text-align: center">Jenis Kelamin Bayi</th>
		                            <th style="text-align: center">Tanggal Imunisasi</th>
		                            <th style="text-align: center;" width="200px">Opsi</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@php
		                    		$no = 1;
		                    	@endphp
		                        @foreach($imunisasi as $p)
		                        	<tr>
			                            <td style="text-align: center">{{$no++}}</td>
			                            <td style="text-align: center">{{$p->user->nama}}</td>
			                            <td style="text-align: center">{{$p->puskesmas->nama}}</td>
										<td style="text-align: center">{{$p->pasien->nama_pasien}}</td>
			                          	<td style="text-align: center">{{date('d-m-Y', strtotime($p->pasien->tgl_lahir))}}</td>
			                            <td style="text-align: center">
			                            	@if($p->jk_bayi == 'L')
			                            		Laki-laki
			                            	@else
			                            		Perempuan
			                            	@endif
			                            </td>
			                           <td style="text-align: center">{{date('d - m - Y', strtotime($p->tgl_imunisasi))}}</td>
			                            <td style="text-align: center;">
			                            	<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailImunisasi{{ $p->pasien_id }}">Lihat</button>
			                            	<a href="{{url('kepmas/imunisasi/'.$p->pasien_id.'/riwayat')}}" class="btn btn-sm btn-info">Riwayat</a>
											<!-- Modal -->
											<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" id="detailImunisasi{{$p->pasien_id}}">
											  <div class="modal-dialog modal-dialog-scrollable" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Imunisasi : {{$p->pasien->nama_pasien}}</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        	<p class="text-left">
											        		Nama Pasien : {{$p->pasien->nama_pasien}}
											        		<br>Tempat Lahir :{{$p->pasien->tempat_lahir}}
											        		<br>Tanggal Lahir :{{$p->pasien->tgl_lahir}}
											        		<br>Jenis Kelamin Bayi :{{$p->pasien->jk_pasien}}
											        		<br>Umur :{{$p->pasien->umur}}
											        		<br>Nama Orang Tua :{{$p->pasien->nama_orangtua}}
											        		<br>Alamat :{{$p->pasien->alamat}}
											        		<br>Tanggal Imunisasi
											        		:{{$p->tgl_imunisasi}}
											        	</p>
											      </div>
											      <div class="modal-footer">
											        <a href="{{url('kepmas/imunisasi/data-imunisasi')}}" class="btn btn-default">Close</a>
											      </div>
											    </div>
											  </div>
											</div>
			                            </td>
			                        </tr>
		                        @endforeach
		                    </tbody>
		                </table>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{asset('backend/js/lib/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/datatables-init.js')}}"></script>
    <script type="text/javascript">
    	function showModal(){
    		$('#detailImunisasi').modal('show');
    	}
    </script>
@endsection