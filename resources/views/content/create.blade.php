@extends('layouts.app')
@section('content')
@section('title', 'Create Content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="{{ url('content/create') }}">
                @csrf
                <div class="card">
                    <div class="card-header"><h3>Add Content</h3></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class ='control-label col-md-3 col-sm-3 col-xs-12'>Judul</label>
                            <div class="item col-sm-9">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="title" class="form-control" value="{{ old('judul') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class ='control-label col-md-3 col-sm-3 col-xs-12'>Kategori</label>
                            <div class="item col-sm-9">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="kategori_id" class="form-control">
                                        <option value="">Pilih kategori</option>
                                        @foreach($list_kategori_get as $items)
                                        <option value="{{ $items->id }}" {{ old("kategori_id") == $items->id ? "selected" : "" }}>{{ $items->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class ='control-label col-md-3 col-sm-3 col-xs-12'>Konten</label>
                            <div class="item col-sm-9">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="konten" class="form-control" rows="5" cols="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('content') }}" class="btn btn-danger">Cancel</a>
                        <button type='submit' id = 'btnSubmit' class='btn btn-success btn-xlg bigger-100 radius-4'>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
