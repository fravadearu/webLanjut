@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Region</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('regions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_kota">Nama Kota:</label>
                <input type="text" class="form-control" id="nama_kota" name="nama_kota" value="{{ old('nama_kota') }}" required>
            </div>
            <div class="form-group">
                <label for="nama_daerah">Nama Daerah:</label>
                <input type="text" class="form-control" id="nama_daerah" name="nama_daerah" value="{{ old('nama_daerah') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
