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
							<hr>
							<form class="" action="{{url('kepmas/imunisasi/cari')}}" method="GET">
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">Pilih Tanggal Imunisasi</label>
											<input type="date" name="tgl_imunisasi" class="form-control">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">Pilih Jenis Imunisasi</label>
											<select class="form-control" name="jenis_imunisasi">
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
											  	<option value="campak_rubela">Campak-Rubela</option>
											  	<option value="je"> JE</option>
											</select>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<button type="submit" name="submit" class="btn btn-primary" style="margin-top: 30px">Cari</button>
										</div>
									</div>
								</div>
							</form>

							<div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th style="text-align: center" width="20px">No</th>
                        <th style="text-align: center">Admin</th>
                        <th style="text-align: center">Puskesmas</th>
                        <th style="text-align: center">Nama Pasien</th>
                        <th style="text-align: center">Jenis Kelamin</th>
                        <th style="text-align: center">Tanggal Imunisasi</th>
												<th style="text-align: center">Jenis Imunisasi</th>
                        <th style="text-align: center;" width="200px">Opsi</th>
                    </tr>
	                </thead>
	                <tbody>
                    	@php
                    		$no = 1;
                    	@endphp
                        @foreach($imunisasi as $p)
						@php
							$jenis_imunisasi = '';
							if($p->jenis_imunisasi == 'hepatitis_b_0'){
								$jenis = 'Hepatitis B 0';
							}elseif($p->jenis_imunisasi == 'polio_1'){
								$jenis = 'Polio 1';
							}elseif($p->jenis_imunisasi == 'polio_2'){
								$jenis = 'Polio 2';
							}elseif($p->jenis_imunisasi == 'polio_3'){
								$jenis = 'Polio 3';
							}elseif($p->jenis_imunisasi == 'polio_4'){
								$jenis = 'Polio 4';
							}elseif($p->jenis_imunisasi == 'ipv'){
								$jenis = 'IPV';
							}elseif($p->jenis_imunisasi == 'bcg'){
								$jenis = 'BCG';
							}elseif($p->jenis_imunisasi == 'dpthb_1'){
								$jenis = 'DPT/HB 1';
							}elseif($p->jenis_imunisasi == 'dpthb_2'){
								$jenis = 'DPT/HB 2';
							}elseif($p->jenis_imunisasi == 'dpthb_3'){
								$jenis = 'DPT/HB 3';
							}elseif($p->jenis_imunisasi == 'campak_rubela'){
								$jenis = 'Campak-Rubela';
							}elseif($p->jenis_imunisasi == 'je'){
								$jenis = 'JE';
							}
						@endphp
                        <tr>
                        <td style="text-align: center">{{$no++}}</td>
                        <td style="text-align: center">{{$p->user->nama}}</td>
                        <td style="text-align: center">{{$p->puskesmas->nama}}</td>
						<td style="text-align: center">{{$p->pasien->nama_pasien}}</td>
                        <td style="text-align: center">
                        	@if($p->pasien->jk_pasien == 'L')
                        		Laki-laki
                        	@else
                        		Perempuan
                        	@endif
                        </td>
                       <td style="text-align: center">{{date('d - m - Y', strtotime($p->tgl_imunisasi))}}</td>
                       <td style="text-align: center">{{$jenis}}</td>
                       <td style="text-align: center;">
                	   <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailImunisasi{{ $p->id }}">Lihat</button>
                	   <a href="{{url('kepmas/imunisasi/'.$p->pasien_id.'/riwayat')}}" class="btn btn-sm btn-info">Riwayat</a>
                            	<!-- <a href="{{url('kepmas/imunisasi/'.$p->id.'/edit-imunisasi')}}" class="btn btn-sm btn-warning">Edit</a> -->
                            </td>
	                        </tr>
													<!-- Modal -->
													<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" id="detailImunisasi{{$p->id}}">
														<div class="modal-dialog modal-dialog-scrollable" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalScrollableTitle">Data Imunisasi : {{$p->pasien->nama_pasien}}</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																		<div class="row">
																			<div class="col-md-4">
																				Nama Pasien
																				<br>
																				Tempat Lahir
																				<br>
																				Tanggal Lahir
																				<br>
																				Jenis Kelamin
																				<br>
																				Umur
																				<br>
																				Nama Orang Tua
																				<br>
																				Alamat
																				<br>
																				Tanggal Imunisasi
																				<br>
																				Jenis Imunisasi
																			</div>
																			<div class="col-md-8">
																				: {{$p->pasien->nama_pasien}}
																				<br>
																				: {{$p->pasien->tempat_lahir}}
																				<br>
																				: {{$p->pasien->tgl_lahir}}
																				<br>
																				: {{$p->pasien->jk_pasien}}
																				<br>
																				: {{$p->pasien->umur}}
																				<br>
																				: {{$p->pasien->nama_ortu}}
																				<br>
																				: {{$p->pasien->alamat}}
																				<br>
																				: {{$p->tgl_imunisasi}}
																				<br>
																				: {{$jenis}}
																			</div>
																		</div>
																</div>
																<div class="modal-footer">
																	<a href="{{url('kepmas/imunisasi/data-imunisasi')}}" class="btn btn-default">Close</a>
																</div>
															</div>
														</div>
													</div>
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
