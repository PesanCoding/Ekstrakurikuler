@extends('layouts.app')
@section('title', 'Jadwal Ektrakurikuler')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Jadwal</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('jadwal.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Hari</label>
                            <select name="hari" id="hari"
                                class="form-control  @error('hari') is-invalid @enderror"">
                                <option value="{{ $data->hari }}">{{ $data->hari }}</option>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jum'at">Jum'at</option>
                                <option value="sabtu">Sabtu</option>
                                <option value="minggu">Minggu</option>
                            </select>
                            @error('hari')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Lokasi</label>
                            <input type="text" name="lokasi" value="{{ $data->lokasi }}"
                                class="form-control  @error('lokasi') is-invalid @enderror"" placeholder="Lokasi"
                                aria-describedby="helpId">
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Jam Mulai</label>
                            <input type="time" name="jam_mulai" id="" value="{{ $data->jam_mulai }}"
                                class="form-control  @error('jam_mulai') is-invalid @enderror"" placeholder="Jam Mulai"
                                aria-describedby="helpId">
                            @error('jam_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Jam Selesai</label>
                            <input type="time" name="jam_selesai" id="" value="{{ $data->jam_selesai }}"
                                class="form-control  @error('jam_selesai') is-invalid @enderror"" placeholder="Jam Selesai"
                                aria-describedby="helpId">
                            @error('jam_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
