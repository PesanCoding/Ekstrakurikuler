@extends('layouts.app')
@section('title', 'Pengumuman')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $data->ekskul->nama_ekskul ?? 'Pengumuman' }}</h4>
                    <p>{{ $data->created_at->diffforHumans() }}</p>
                </div>
                <div class="card-body">
                    <div class="divider divider-left">
                        <div class="divider-text">Pengumuman</div>
                    </div>
                    <p style="text-align: justify">
                        {{ $data->isi }}
                    </p>
                    <img class="mt-1" src="{{ \Storage::url($data->gambar) }}" alt="" width="40%"><br>
                    @if ($data->id_ekskul == null)
                        <span class="badge badge-danger mt-1">
                            Created By: {{ $data->created_by }}
                        </span>
                    @else
                        <span class="badge badge-primary mt-1">
                            Created By: {{ $data->created_by }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
