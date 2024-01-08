@extends('layouts.app')
@section('title', 'Jadwal')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <section id="collapsible">
        <div class="row">
            <div class="col-sm-12">
                <div class="card collapse-icon">
                    <div class="card-header">
                        <h4 class="card-title">Jadwal kegiatan yang diikuti</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        </p>
                        @foreach ($data as $item)
                            <div class="collapse-default">
                                <div class="card">
                                    <div id="headingCollapse{{ $loop->iteration }}" class="card-header"
                                        data-toggle="collapse" role="button" data-target="#collapse{{ $loop->iteration }}"
                                        aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                                        <span class="lead collapse-title">{{ $loop->iteration }}.
                                            <span class="badge badge-success">{{ $item->nama_ekskul }}</span>
                                        </span>
                                    </div>
                                    <div id="collapse{{ $loop->iteration }}" role="tabpanel"
                                        aria-labelledby="headingCollapse{{ $loop->iteration }}" class="collapse">
                                        <div class="card-body">
                                            @foreach ($item->detailEkskul as $jadwal)
                                                <ul>
                                                    <li>
                                                        {{ $jadwal->hari }} : {{ $jadwal->jam_mulai }} s/d
                                                        {{ $jadwal->jam_selesai }} <br>
                                                        Lokasi : {{ $jadwal->lokasi }}<br>
                                                        Pembina : {{ $item->user->name }}
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
