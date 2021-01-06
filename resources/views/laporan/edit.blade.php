@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <h4 class="card-title">Edit Laporan Kegiatan</h4>
                        <div class="form-group row">
                            <label for="count" class="col-sm-3 text-right control-label col-form-label">Jumlah Pastisipan</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="count" name="count" value="{{ $laporan->count }}" autocomplete="off">
                            </div>

                            <label class="col-sm-3 text-right control-label col-form-label">Dokumentasi Kegiatan</label>
                            <div class="col-md-9">
                                <img src="{{asset('storage/image/'.$laporan->image)}}" class="img-thumbnail my-3" alt="" style="width: 100px;">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="file">
                                    <label class="custom-file-label" for="validatedCustomFile">Pilih file kegiatan</label>
                                </div>
                                <p><i> *file .jpg .png .jpeg</i></p>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{ route('laporan.index') }}" class="btn btn-warning">Kembali</a>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection