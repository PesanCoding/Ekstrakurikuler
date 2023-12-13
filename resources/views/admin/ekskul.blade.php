@extends('layouts.app')
@section('title', 'Data Ektrakurikuler')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('ekskul.create') }}" class="btn btn-sm btn-primary"> Tambah Ekskul</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ektrakurikuler</th>
                                <th>Pembina</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataEkskul as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_ekskul }}</td>
                                    <td>
                                        <div class="badge badge-glow badge-warning">
                                            {{ $item->user->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('ekskul.show', $item->id) }}">
                                            <i data-feather='eye'></i> Detail Jadwal
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
