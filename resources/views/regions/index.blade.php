@extends('layouts.app') {{-- Assuming you have a basic layout file --}}

@section('content')
    <div class="container">
        <h1>Regions</h1>

        <a href="{{ route('regions.create') }}" class="btn btn-primary mb-3">Create New Region</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kota</th>
                    <th>Nama Daerah</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($regions as $region)
                    <tr>
                        <td>{{ $region->id }}</td>
                        <td>{{ $region->nama_kota }}</td>
                        <td>{{ $region->nama_daerah }}</td>
                        <td>
                            <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('regions.destroy', $region->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
