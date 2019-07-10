@extends('layouts.master')
    @section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
                 <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                 @if($countDokumentasi > 0)                    
                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading">Dokumentasi!</h4>
                        <hr>
                        <hr>
                        @foreach($dokumentasis as $dokumentasi)
                            <strong>{{$dokumentasi->nama_kegiatan}}</strong>
                            <p style="color: #2f3033">{{$dokumentasi->tanggal}}</p>
                            <p class="mb-0" style="color: #2f3033">
                                <a href="{{asset('images/Dokumentasi/'.$dokumentasi->foto)}}" target="_blank" class="" style="color: blue"> Lihat Gambar</a>
                                <hr>
                            </p>
                        @endforeach
                    </div>
                    @else
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading">Tidak ada Dokumentasi!</h4>
                        </div>   
                    @endif
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-user f-s-40 color-success"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2>{{$countPasien}}</h2>
                                                <p class="m-b-0">Total Pasien</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-medkit f-s-40 color-warning"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2>{{$countImunisasi}}</h2>
                                                <p class="m-b-0">Total Imunisasi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-calendar-plus-o f-s-40 color-primary"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2>{{$countProgramSekolah}}</h2>
                                                <p class="m-b-0">Total Program Imunisasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
    </div>
    @endsection