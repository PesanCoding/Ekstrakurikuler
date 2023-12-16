@extends('layouts.app')
@section('title', 'Ekskul')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>EkstraKulikuler</h4>
                </div>
                <div class="card-body">
                    <div class="demo-spacing-0">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-body"><strong>Perhatian!</strong> Belum ada kegiatan ekskul yang diikuti.</div>
                        </div>
                        <a href="{{ route('pendaftran.index') }}" class="btn btn-sm btn-primary"><i data-feather='inbox'>
                            </i>Daftar Sekarang.</a>
                    </div>
                </div>
                <div class="card-footer">
                    <p><i>"Siswa hanya Boleh mengikuti dua kegiatan saja."</i></p>
                </div>
            </div>
        </div>
    </div>
@endsection
