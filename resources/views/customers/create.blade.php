@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">Add New Customer</h4>
                        <a href="{{ url('content/index') }}" class="btn btn-secondary float-end">Back to List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Customer Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="region_id" class="form-label">Region</label>
                                <select class="form-select @error('region_id') is-invalid @enderror" id="region_id"
                                    name="region_id">
                                    <option value="">Select Region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}"
                                            {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                            {{ $region->nama_kota }} - {{ $region->nama_daerah }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('region_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save Customer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
