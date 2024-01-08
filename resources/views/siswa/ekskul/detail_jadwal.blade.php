@extends('layouts.app')
@section('title', 'Detail Ekskul')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row match-height">
        <div class="col-lg-12 col-12">
            <div class="card card-revenue-budget">
                <div class="row mx-0">
                    <div class="col-md-8 col-12 revenue-report-wrapper">
                        <div class="d-sm-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title mb-50 mb-sm-0">{{ $data->nama_ekskul }}</h4>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                                </div>
                                <span></span>
                            </div>
                        </div>
                        <div class="badge badge-glow badge-warning mb-1">
                            Pembina {{ $data->user->name }}
                        </div>
                        <div class="align-items-center">
                            <center>
                                @if ($data->gambar == null)
                                    <img src="{{ asset('template/app-assets/images/slider/09.jpg') }}" width="300px"
                                        alt="">
                                @else
                                    <img src="{{ \Storage::url($data->gambar) }}" width="300px" alt="">
                                @endif
                            </center>
                        </div>

                        <h5 class="mt-1">Deskripsi</h5>
                        <p style="text-align: justify">
                            {{ $data->deskripsi }}
                        </p>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="d-flex justify-content-center mt-2">
                            <h4>Jadwal Kegiatan</h4>
                        </div>
                        @foreach ($data->detailEkskul as $jadwal)
                            <ul>
                                <li>
                                    {{ $jadwal->hari }} : {{ $jadwal->jam_mulai }} s/d {{ $jadwal->jam_selesai }} <br>
                                    Lokasi : {{ $jadwal->lokasi }}
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
