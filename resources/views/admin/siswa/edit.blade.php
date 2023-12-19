@extends('layouts.app')
@section('title', 'Create Siswa')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            Form siswa
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" value="{{ $siswa->name }}" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nama"
                                aria-describedby="helpId" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="Nisn">NISN</label>
                            <input type="text" value="{{ $siswa->nisn }}" name="nisn" id=""
                                class="form-control @error('nisn') is-invalid @enderror" placeholder="nisn"
                                aria-describedby="helpId" readonly>
                            @error('nisn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="" class="form-control @error('kelas') is-invalid @enderror">
                                <option value="{{ $siswa->kelas }}">{{ $siswa->kelas }}</option>
                                <option value="X">X (Sepuluh)</option>
                                <option value="XI">XI (Sebelas)</option>
                                <option value="XII">XII (Duabelas)</option>
                            </select>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id=""
                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="{{ $siswa->jenis_kelamin }}">{{ $siswa->jenis_kelamin }}</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nohp">No Telepon</label>
                            <input type="text" name="nohp" value="{{ $siswa->nohp }}"
                                class="form-control @error('nohp') is-invalid @enderror" placeholder="Nomor Telepon"
                                aria-describedby="helpId">
                            @error('nohp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="hobi">Hobi</label>
                            <input type="text" name="hobi" value=" {{ $siswa->hobi }}"
                                class="form-control @error('hobi') is-invalid @enderror" placeholder="Hobi"
                                aria-describedby="helpId">
                            @error('hobi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="customFile">Photo</label>
                            <div class="custom-file">
                                <input type="file" name="photo_profile"
                                    class="custom-file-input @error('photo_profile') is-invalid @enderror"
                                    id="customFile" />
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('photo_profile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="alamat" id="" cols="30" rows="2"
                            class="form-control @error('alamat') is-invalid @enderror">
                            {{ $siswa->alamat }}
                        </textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn  btn-warning mt-1" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
