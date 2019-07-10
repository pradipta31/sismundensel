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
		            <h4 class="card-title">Data Program Imunisasi</h4>
		            <a href="{{url('admin/program/cetak-program/'.$users->id)}}" class="btn btn-primary">Cetak Data</a>
                            <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                               		 <thead>
		                        <tr>
		                            <th style="text-align: center" width="15px">No</th>
		                            <th style="text-align: center">Puskesmas</th>
		                            <th style="text-align: center">Nama Sekolah</th>
		                            <th style="text-align: center">Tanggal Imunisasi</th>
		                            <th style="text-align: center">Jumlah Siswa</th>
		                           	<th style="text-align: center">Jumlah Imunisasi</th>
		                            <th style="text-align: center">Jenis Imuisasi</th>
		                            <th style="text-align: center;" width="120px">Opsi</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@php
		                    		$no = 1;
		                    	@endphp
		                        @foreach($programsekolah as $p)
		                        	<tr>
			                            <td style="text-align: center">{{$no++}}</td>
			                            <td style="text-align: center">{{$p->puskesmas->nama}}</td>
										<td style="text-align: center">{{$p->nama_sekolah}}</td>
			                          	<td style="text-align: center">{{date('d - m - Y', strtotime($p->tanggal_imunisasi))}}</td>
			                          	<td style="text-align: center">{{$p->jumlah_siswa}}</td>
			                          	<td style="text-align: center">{{$p->jumlah_imunisasi}}</td>
			                          	<td style="text-align: center">{{$p->jenis_imunisasi}}</td>

			                            <td style="text-align: center;">
			                            	<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailProgramSekolah{{ $p->id }}">Lihat</button>
			                            	<a href="{{url('admin/program/'.$p->id.'/edit-program')}}" class="btn btn-sm btn-warning">Edit</a>
											<!-- Modal -->
											<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" id="detailProgramSekolah{{$p->id}}">
											  <div class="modal-dialog modal-dialog-scrollable" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Program Sekolah : {{$p->nama_sekolah}}</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        	<p class="text-left">
											        		Nama Sekolah : {{$p->nama_sekolah}}
											        		<br>Tanggal Imunisasi:{{$p->tanggal_imunisasi}}
											        		<br>Jumlah Siswa :{{$p->jumlah_siswa}}
											        		<br>Jumlah Imunisasi:{{$p->jumlah_imunisasi}}
											        		<br>Jenis Imunisasi :{{$p->jenis_imunisasi}}
											        	</p>
											      </div>
											      <div class="modal-footer">
											        <a href="{{url('admin/program/data-program')}}" class="btn btn-default">Close</a>
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
    		$('#detailProgramSekolah').modal('show');
    	}
    </script>
@endsection