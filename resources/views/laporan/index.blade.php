@extends('layouts.main')

@section('content')

<div class="card-body">
    <h5 class="card-title">Laporan Kegiatan</h5>
    <a href="{{ route('laporan.create') }}" class="btn btn-primary my-3">Tambah Laporan</a>
    @if($message = Session::get('message'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama Kegiatan</th>
                    <th>Jumlah Partisipan</th>
                    <th>Dokumentasi</th>
                    <th>Acttion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporan as $row)
                <tr>
                    <td>{{ $row->kegiatan->name }}</td>
                    <td>{{ $row->count }}</td>
                    <td><img src="{{asset('storage/image/'.$row->image)}}" style="width: 100px;"></td>
                    <td>
                        <a href="{{ route('laporan.edit' , $row->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{route('laporan.destroy', $row->id) }}" method="POST" style="display: inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection