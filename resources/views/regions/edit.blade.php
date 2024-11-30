@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Region</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('regions.update', $region->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_kota">Nama Kota:</label>
                <input type="text" class="form-control" id="nama_kota" name="nama_kota" value="{{ old('nama_kota', $region->nama_kota) }}" required>
            </div>
            <div class="form-group">
                <label for="nama_daerah">Nama Daerah:</label>
                <input type="text" class="form-control" id="nama_daerah" name="nama_daerah" value="{{ old('nama_daerah', $region->nama_daerah) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
