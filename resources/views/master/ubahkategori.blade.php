@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form Kategori') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('kategori.update', $detail->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="code">{{ __('Kode') }}</label>
                            <input id="code" type="text" class="form-control" name="code" value="{{ $detail->kode }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('Nama') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $detail->nama }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
