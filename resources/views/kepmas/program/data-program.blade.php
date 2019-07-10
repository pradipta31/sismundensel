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
		            <a href="{{url('kepmas/program/cetak-program/'.$users->id)}}" class="btn btn-primary">Cetak Data</a>
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
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@php
		                    		$no = 1;
		                    	@endphp
		                        @foreach($programsekolah as $p)
		                        	<tr>
			                            <td style="text-align: center">{{$no++}}</td>
			                            <td style="text-align: center;">{{$p->puskesmas->nama}}</td>
										<td style="text-align: center;">{{$p->nama_sekolah}}</td>
			                          	<td style="text-align: center">{{$p->tanggal_imunisasi}}</td>
			                          	<td style="text-align: center">{{$p->jumlah_siswa}}</td>
			                          	<td style="text-align: center">{{$p->jumlah_imunisasi}}</td>
			                          	<td style="text-align: center">{{$p->jenis_imunisasi}}</td>
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