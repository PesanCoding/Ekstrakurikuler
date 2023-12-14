@extends('layouts.app')
@section('title', 'Data Siswa')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary"> Tambah siswa</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama / NISN</th>
                                <th>Email</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->name }} <br>
                                        {{ $item->nisn }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('siswa.show', $item->id) }}">
                                            <i data-feather='eye'></i> Detail Siswa
                                        </a>
                                        <button class=" btn btn-sm btn-danger"><i data-feather='trash'></i> Hapus</button>
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
