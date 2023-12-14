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
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama" aria-describedby="helpId" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="Nisn">NISN</label>
                            <input type="text" name="nisn" id=""
                                class="form-control @error('nisn') is-invalid @enderror" placeholder="nisn"
                                aria-describedby="helpId">
                            @error('nisn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="">Email</label>
                            <input type="email" name="email" id=""
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                aria-describedby="helpId" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Password</label>
                            <input type="password" name="password" id=""
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                aria-describedby="helpId">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="" class="form-control @error('kelas') is-invalid @enderror">
                                <option value="">--Pilih Kelas--</option>
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
                                <option value="">--Jenis Kelamin--</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="nohp">No Telepon</label>
                            <input type="text" name="nohp" id=""
                                class="form-control @error('nohp') is-invalid @enderror" placeholder="Nomor Telepon"
                                aria-describedby="helpId">
                            @error('nohp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="hobi">Hobi</label>
                            <input type="text" name="hobi" id=""
                                class="form-control @error('hobi') is-invalid @enderror" placeholder="Hobi"
                                aria-describedby="helpId">
                            @error('hobi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="alamat" id="" cols="30" rows="2"
                            class="form-control @error('alamat') is-invalid @enderror">
                            {{ old('alamat') }}
                        </textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn  btn-primary mt-1" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
