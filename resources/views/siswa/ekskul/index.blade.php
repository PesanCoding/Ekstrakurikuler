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
                    <a href="{{ route('pendaftran.index') }}" class="btn btn-sm btn-primary mt-2"><i data-feather='inbox'>
                        </i>Daftar Sekarang.</a>
                </div>
                <div class="card-body">
                    @if ($data == null)
                        <div class="demo-spacing-0">
                            <div class="alert alert-warning" role="alert">
                                <div class="alert-body"><strong>Perhatian!</strong> Belum ada kegiatan ekskul yang diikuti.
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row mt-1">
                        @foreach ($data as $item)
                            <div class="col-md-6 col-xl-4">
                                <div class="card border-0 text-white">
                                    <img class="card-img" src="{{ asset('template/app-assets/images/slider/10.jpg') }}"
                                        alt="Card image" />
                                    <div class="card-img-overlay bg-overlay">
                                        <h4 class="card-title text-white">Card title</h4>
                                        <p class="card-text">
                                            This is a wider card with supporting text below as a natural lead-in to
                                            additional
                                            content. This content is
                                            a little bit longer.
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="card-footer">
                    <p><i>"Siswa hanya Boleh mengikuti dua kegiatan saja."</i></p>
                </div>
            </div>
        </div>
    </div>
@endsection
