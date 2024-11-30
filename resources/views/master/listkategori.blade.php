@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Daftar Kategori') }}
                    <a href="{{ url('kategori/create') }}" class="btn btn-primary float-right">{{ __('Create') }}</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('Kode Kategori') }}</th>
                                <th>{{ __('Nama Kategori') }}</th>
                                <th>{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_content as $value)
                            <tr>
                                <td>{{ $value->kode }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>
                                    <a href="{{ url('kategori/'.$value->id.'/edit') }}" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>
                                    <a href="{{ url('kategori/'.$value->id.'/hapus') }}" class="btn btn-sm btn-danger">{{ __('Hapus') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
