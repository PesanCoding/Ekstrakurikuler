@extends('layouts.app')
@section('title', 'Create Ektrakurikuler')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Form Edit Ektrakurikuler
                </div>
                <div class="card-body">
                    <form action="{{ route('ekskul.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Ektrakurikuler">Ektrakurikuler</label>
                            <input type="text" name="nama_ekskul" value="{{ old('nama_ekskul', $data->nama_ekskul) }}"
                                class="form-control @error('nama_ekskul') is-invalid @enderror"
                                placeholder="Nama Ekstrakulikuler" aria-describedby="helpId">
                            @error('nama_ekskul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Penanggung Jawab</label>
                            <select name="penanggung_jawab" id="penanggung_jawab"
                                class="form-control @error('penanggung_jawab') is-invalid @enderror">
                                <option value="{{ $data->penanggung_jawab }}">{{ $data->user->name }}</option>
                                @foreach ($usersWithRole as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('penanggung_jawab')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Ektrakurikuler">Kuota</label>
                            <input type="number" name="kuota" id="" value="{{ $data->kuota }}"
                                class="form-control @error('kuota') is-invalid @enderror" placeholder="Kuota"
                                aria-describedby="helpId">
                            @error('kuota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
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
                            <label for="Ektrakurikuler">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control  @error('deskripsi') is-invalid @enderror" cols="30" rows="4">
                            {{ $data->deskripsi }}
                            </textarea>
                            @error('dskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn  btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
