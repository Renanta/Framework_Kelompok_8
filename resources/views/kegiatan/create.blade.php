@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" action="{{ route('kegiatan.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Tambah Kegiatan</h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Nama Kegiatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Kegiatan" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 text-right control-label col-form-label">Tanggal Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="date" name="date" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-sm-3 text-right control-label col-form-label">Tempat Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="location" name="location" placeholder="Masukkan Lokasi Kegiatan" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Kategori</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="category_id">
                                    <option>Select</option>
                                    @foreach( $category as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="{{ route('kegiatan.index') }}" class="btn btn-warning">Kembali</a>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection