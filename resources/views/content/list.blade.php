@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url ('content/create')}}" class="btn btn-primary">Tambah Content</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Judul</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($list as $value)
                        <tr>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>
                                <a href="{{ url('content/'.$value->content_id.'/edit') }}">Edit</a> |
                                <a href="{{ url('content/'.$value->content_id.'/hapus') }}">Hapus</a> |
                                <a href="{{ url('content/pdf/'.$value->content_id) }}">Download</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
