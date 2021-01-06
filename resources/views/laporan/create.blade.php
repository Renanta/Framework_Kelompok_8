@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Tambah Laporan Kegiatan</h4>
                        <div class="form-group row">
                            <label for="kegiatan" class="col-sm-3 text-right control-label col-form-label">Nama Kegiatan</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="kegiatan_id">
                                    <option>Select</option>
                                    @foreach( $kegiatan as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="count" class="col-sm-3 text-right control-label col-form-label">Jumlah Pastisipan</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="count" name="count" placeholder="Masukkan Jumlah Partisipan" autocomplete="off">
                            </div>
                            <label class="col-sm-3 text-right control-label col-form-label">Dokumentasi Kegiatan</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="file" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Pilih file kegiatan</label>
                                </div>
                                <p><i> *file .jpg .png .jpeg</i></p>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="{{ route('laporan.index') }}" class="btn btn-warning">Kembali</a>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection