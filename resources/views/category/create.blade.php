@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Tambah Kategori</h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Nama Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama kategori" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="{{ route('category.index') }}" class="btn btn-warning">Kembali</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection