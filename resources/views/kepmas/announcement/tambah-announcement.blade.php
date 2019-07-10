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
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Tambah Pengumuman</h4>
                        <form class="form p-t-20" action="{{url('kepmas/announcement/tambah-announcement')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <div class="input-group">
                                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Judul">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gambar</label>
                                <div class="input-group">
                                    <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Gambar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Isi</label>
                                <div class="input-group">
                                    <textarea name="isi" class="form-control" rows="5"></textarea>
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