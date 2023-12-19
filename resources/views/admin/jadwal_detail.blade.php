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
                    <h4>Jadwal Ektrakurikuler - {{ $data->nama_ekskul }}</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('jadwal.show', $data->id) }}" class="btn btn-sm btn-primary">Tambah
                        Jadwal</a>

                    <table class="table table-sm mt-2">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Hari</th>
                                <th>Lokasi</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->detailEkskul as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->hari }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->jam_mulai }}</td>
                                    <td>{{ $item->jam_selesai }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?')"
                                            action="{{ route('jadwal.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('jadwal.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
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
