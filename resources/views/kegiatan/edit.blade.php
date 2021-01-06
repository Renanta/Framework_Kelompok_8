@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" action="{{route('kegiatan.update',$kegiatan->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <h4 class="card-title">Edit kegiatan</h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Nama kegiatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $kegiatan->name }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 text-right control-label col-form-label">Tanggal Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="date" name="date" value="{{ $kegiatan->date }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-sm-3 text-right control-label col-form-label">Tempat Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="location" name="location" value="{{ $kegiatan->location }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Kategori</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="category_id">
                                    <option>{{ $categoryId->name }}</option>
                                    @foreach($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="{{ route('kegiatan.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection