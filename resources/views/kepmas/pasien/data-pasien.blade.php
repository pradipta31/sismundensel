@extends('layouts.master')
@section('css')

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Pasien</h4>
                                <a href="{{url('kepmas/pasien/cetak-pasien/'.$users->id)}}" class="btn btn-primary">Cetak Data</a>
                                <div class="table-responsive m-t-40">
                                   <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
			                        <tr>
			                            <th style="text-align: center" width="15px">No</th>
			                            <th style="text-align: center">Admin</th>
			                            <th style="text-align: center">Puskesmas</th>
			                            <th style="text-align: center">Nama Pasien</th>
			                            <th style="text-align: center">Tempat Lahir</th>
			                            <th style="text-align: center">Tanggal Lahir</th>
			                            <th style="text-align: center">Jenis Kelamin Pasien</th>
			                            <th style="text-align: center">Nama Orang Tua</th>
			                            <th style="text-align: center">Umur</th>
			                            <th style="text-align: center">Alamat</th>
			                            <th style="text-align: center;">Opsi</th>
			                        </tr>
			                    </thead>
			                    <tbody>
		                    	@php
		                    		$no = 1;
		                    	@endphp
		                        @foreach($pasien as $p)
		                        	<tr>
			                            <td style="text-align: center">{{$no++}}</td>
			                            <td style="text-align: center">{{$p->user->nama}}</td>
			                            <td style="text-align: center">{{$p->puskesmas->nama}}</td>
										<td style="text-align: center">{{$p->nama_pasien}}</td>
										<td style="text-align: center">{{$p->tempat_lahir}}</td>
			                          	<td style="text-align: center">{{date('d - m - Y', strtotime($p->tgl_lahir))}}</td>

			                            <td style="text-align: center">
			                            	@if($p->jk_pasien == 'L')
			                            		Laki-laki
			                            	@else
			                            		Perempuan
			                            	@endif
			                            </td>
			                            <td style="text-align: center">{{$p->nama_ortu}}</td>
			                            <td style="text-align: center">{{$p->umur}}</td>
			                            <td style="text-align: center">{{$p->alamat}}</td>
			                            </td>
			                            <td style="text-align: center;">
			                            	<button class="btn btn-primary" data-toggle="modal" data-target="#detailPasien{{ $p->id }}">Lihat</button>
											<!-- Modal -->
											<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" id="detailPasien{{$p->id}}">
											  <div class="modal-dialog modal-dialog-scrollable" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Pasien : {{$p->nama_pasien}}</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        	<p class="text-left">
											        		Nama Pasien : {{$p->nama_pasien}}
											        		<br>Tempat Lahir :{{$p->tempat_lahir}}
											        		<br>Tanggal Lahir :{{$p->tgl_lahir}}
											        		<br>Jenis Kelamin Pasien :{{$p->jk_pasien}}
											        		<br>Nama Orang Tua :{{$p->nama_ortu}}
											        		<br>Alamat :{{$p->alamat}}
											        		<br>Umur :{{$p->umur}}
											        	</p>
											      </div>
											      <div class="modal-footer">
											        <a href="{{url('kepmas/pasien/data-pasien')}}" class="btn btn-default">Close</a>
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
    		$('#detailPasien').modal('show');
    	}
    </script>
@endsection