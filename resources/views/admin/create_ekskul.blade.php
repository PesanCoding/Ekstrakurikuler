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
                    Form Ektrakurikuler
                </div>
                <div class="card-body">
                    <form action="{{ route('ekskul.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Ektrakurikuler">Ektrakurikuler</label>
                            <input type="text" name="nama_ekskul" id="" class="form-control"
                                placeholder="Nama Ekstrakulikuler" aria-describedby="helpId">
                        </div>
                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Penanggung Jawab</label>
                            <select name="penanggung_jawab" id="penanggung_jawab" class="form-control">
                                <option value="">--Pilih Pembina--</option>
                                @foreach ($usersWithRole as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Lokasi</label>
                            <input type="text" name="lokasi" id="" class="form-control" placeholder="Lokasi"
                                aria-describedby="helpId">
                        </div>

                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Hari</label>
                            <select name="hari" id="hari" class="form-control">
                                <option value="">--Pilih Hari--</option>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jum'at">Jum'at</option>
                                <option value="sabtu">Sabtu</option>
                                <option value="minggu">Minggu</option>
                            </select>
                        </div>

                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Jam Mulai</label>
                            <input type="time" name="jam_mulai" id="" class="form-control"
                                placeholder="Jam Mulai" aria-describedby="helpId">
                        </div>
                        <div class="form-group mt-1">
                            <label for="Ektrakurikuler">Jam Selesai</label>
                            <input type="time" name="jam_selesai" id="" class="form-control"
                                placeholder="Jam Selesai" aria-describedby="helpId">
                        </div>

                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
