@extends('layouts.master')
@section('content')
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="card">
		        <div class="card-body">
		            <h4 class="card-title">Riwayat Imunisasi <b>{{$imunisasi->pasien->nama_pasien}}</b> </h4>
                            <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                            	<thead>
                            		<tr>
		                            	<th style="text-align: center">Hepatitis B 0</th>
			                        		<th style="text-align: center">Polio 1</th>
			                        		<th style="text-align: center">Polio 2</th>
			                        		<th style="text-align: center">Polio 3</th>
			                        		<th style="text-align: center">Polio 4</th>
			                        		<th style="text-align: center">IPV</th>
											<th style="text-align: center">BCG</th>
											<th style="text-align: center">DPT/HB 1</th>
											<th style="text-align: center">DPT/HB 2</th>
											<th style="text-align: center">DPT/HB 3</th>
											<th style="text-align: center">Campak-Rubela</th>
											<th style="text-align: center">JE</th>
										</tr>
                            	</thead>
		                    <tbody>
		                        @foreach($imunisasi_p as $p)
		                        	<tr>
		                        		<td>
		                        			@if($p->hepatitis_b_0 != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->polio_1 != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->polio_2 != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->polio_3 != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->polio_4 != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->ipv != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->bcg != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->dpthb_1 != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->dpthb_2 != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->dpthb_3 != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->campak_rubela!= null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
		                        		</td>
		                        		<td>
		                        			@if($p->je != null)
			                        			<center><i class="fa fa-check"></i></center>
			                        		@else
			                        			<center>-</center>
			                        		@endif
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
	<!-- <script src="{{asset('backend/js/lib/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/datatables/datatables-init.js')}}"></script> -->
@endsection
