@extends('layouts.app')
@section('title', 'Pendaftaran')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Pendaftaran </h4>
                    <p>Kegiatan Ektrakulikuler - {{ $post->nama_ekskul }}</p>
                </div>
                <div class="card-body">
                    <div class="demo-spacing-0">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-body"><strong>Perhatian!</strong>Isi data diri dengan lengkap</div>
                        </div>
                    </div>
                    <form action="{{ route('pendaftran.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_siswa" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="id_ekskul" value="{{ $post->id }}">
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input type="text" name="" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ekskul</label>
                            <input type="text" name="" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $post->nama_ekskul }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Alasan</label>
                            <textarea name="alasan" id="" cols="30" rows="5" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
