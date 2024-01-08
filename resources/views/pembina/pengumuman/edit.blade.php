@extends('layouts.app')
@section('title', 'Edit Pengumuman')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Pengumuman</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengumuman.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group mt-1">
                            <label for="">Isi pngumuman</label>
                            <textarea name="isi" id="isi" class="form-control @error('isi') is-invalid @enderror" cols="30"
                                rows="6">{{ $data->isi }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="customFile">Gambar</label>
                            <div class="custom-file">
                                <input type="file" name="gambar"
                                    class="custom-file-input @error('gambar') is-invalid @enderror" id="customFile" />
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Url</label>
                            <input type="text" value="{{ $data->url }}" name="url" id=""
                                class="form-control @error('url')
                               is-invalid
                            @enderror"
                                placeholder="" aria-describedby="helpId">
                            @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
