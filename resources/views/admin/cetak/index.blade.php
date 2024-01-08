@extends('layouts.app')
@section('title', 'Cetak Data')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <form action="{{ route('cetak.post') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-3">
                <label for="">Pilih Ekskul</label>
                <select class="form-control" name="ekskul" id="">
                    <option value="semua">-- Semua Ekskul --</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_ekskul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2">
                <label for="">Pilih Kelas</label>
                <select class="form-control" name="kelas" id="">
                    <option value="semua">-- semua kelas --</option>
                    <option value="X">X (Sepuluh) </option>
                    <option value="XI">XI (Sebelas) </option>
                    <option value="XII">XII (Duabelas)</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-warning mt-1">Cetak</button>
    </form>
@endsection
