@extends('layouts.app')
@section('title', 'List Ekskul')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    @foreach ($list as $item)
        <div class="row match-height">
            <div class="col-lg-12 col-12">
                <div class="card card-revenue-budget">
                    <div class="row mx-0">
                        <div class="col-md-8 col-12 revenue-report-wrapper">
                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-50 mb-sm-0">{{ $item->nama_ekskul }}</h4>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                                        <span>Kuota : {{ $item->kuota }}</span>
                                    </div>
                                    <span></span>
                                </div>
                            </div>
                            <div class="badge badge-glow badge-warning mb-1">
                                Pembina {{ $item->user->name }}
                            </div>
                            <div class="align-items-center">
                                <center>
                                    @if ($item->gambar == null)
                                        <img src="{{ asset('template/app-assets/images/slider/09.jpg') }}" width="300px"
                                            alt="">
                                    @else
                                        <img src="{{ \Storage::url($item->gambar) }}" width="300px" alt="">
                                    @endif
                                </center>
                            </div>

                            <h5 class="mt-1">Deskripsi</h5>
                            <p style="text-align: justify">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="d-flex justify-content-center mt-2">
                                <h4>Jadwal Kegiatan</h4>
                            </div>
                            @foreach ($item->detailEkskul as $jadwal)
                                <ul>
                                    <li>
                                        {{ $jadwal->hari }} : {{ $jadwal->jam_mulai }} s/d {{ $jadwal->jam_selesai }} <br>
                                        Lokasi : {{ $jadwal->lokasi }}
                                    </li>
                                </ul>
                            @endforeach
                            <div class="d-flex justify-content-center mt-2 mb-2">
                                <a href="{{ route('pendaftran.show', $item->id) }}"> Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
