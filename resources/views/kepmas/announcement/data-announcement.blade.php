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
		            <h4 class="card-title">Data Pengumuman</h4>
		            <div class="table-responsive m-t-40">
		                <table id="myTable" class="table table-bordered table-striped">
		                    <thead>
		                        <tr>
		                            <th style="text-align: center" width="15px">No</th>
		                            <th style="text-align: center">Admin</th>
		                            <th style="text-align: center">Judul</th>
		                            <th style="text-align: center">Gambar</th>
		                            <th style="text-align: center">Isi</th>
		                            <th style="text-align: center">Status</th>
		                            <th style="text-align: center;">Opsi</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@php
		                    		$no = 1;
		                    	@endphp
		                        @foreach($announcement as $p)
		                        	<tr>
			                            <td style="text-align: center">{{$no++}}</td>
			                            <td style="text-align: center">{{$p->user->nama}}</td>
			                            <td style="text-align: justify;">{{$p->judul}}</td>
			                            <td style="text-align: center">
			                            	@if($p->gambar != null)
			                            		<img src="{{asset('images/pengumuman/'.$p->gambar)}}" width="250px">
			                            	@else
			                            		<center>-</center>
			                            	@endif
			                            </td>
			                            <td style="text-align: justify;">{{$p->isi}}</td>
			                             <td style="text-align: center">
			                            	@if($p->status == 'aktif')
			                            		<span style="color: green"><i class="fa fa-check"> Aktif</i></span>
			                            	@else
			                            		<span style="color: red">
			                            			<i class="fa fa-exclamation"></i> Non Aktif
			                            		</span>
			                            	@endif
							            	</td>
							                <td style="text-align: center;">
							                <a href="{{url('kepmas/announcement/'.$p->id.'/edit-announcement')}}" class="btn btn-warning">Edit</a>
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
@endsection