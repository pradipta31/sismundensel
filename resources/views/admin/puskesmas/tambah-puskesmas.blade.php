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
                        <h4 class="card-title">Tambah Puskesmas</h4>
                        <form class="form p-t-20" action="{{url('admin/puskesmas/tambah-puskesmas')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputuname">Nama Puskesmas</label>
                                <div class="input-group">
                                    <input type="text" name="nama" class="form-control" id="exampleInputuname" placeholder="Nama Puskesmas">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <div class="input-group">
                                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Alamat">
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