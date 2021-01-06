@extends('layouts.main')

@section('content')

<div class="card-body">
    <h5 class="card-title">Kategori Kegiatan</h5>
    <a href="{{ route('category.create') }}" class="btn btn-primary my-3">Tambah Kategori</a>
    @if($message = Session::get('message'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->description}}</td>
                    <td>
                        <a href="{{ route('category.edit' , $row->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{route('category.destroy', $row->id) }}" method="POST" style="display: inline" onsubmit="return confirm('Apakah ingin menghapus data?')">
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