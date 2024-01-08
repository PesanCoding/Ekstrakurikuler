@extends('layouts.app')
@section('title', 'Pendaftaran')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Siswa Pendaftar</h4>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                    {{-- <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->nisn }}</td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>{{ $item->user->nohp }}</td>
                                    <td>
                                        @if ($item->status_pendaftran == 'belum disetujui')
                                            <span class="badge badge-warning">
                                                <a href="{{ route('pendaftaran.update', $item->id) }}">
                                                    {{ $item->status_pendaftran }} </a>
                                            </span>
                                        @else
                                            <span class="badge badge-success">
                                                {{ $item->status_pendaftran }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
