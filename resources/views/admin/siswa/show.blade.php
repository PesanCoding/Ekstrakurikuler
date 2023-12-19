@extends('layouts.app')
@section('title', 'Detail Siswa')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            @if ($siswa->photo_profile == null)
                                <img src="{{ asset('template/app-assets/images/slider/09.jpg') }}" width="200px"
                                    height="200" alt="">
                            @else
                                <img src="{{ \Storage::url($siswa->photo_profile) }}" width="200px" height="200"
                                    alt="">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <table class="table table-sm">
                                <tr>
                                    <td>Nama</td>
                                    <td> : {{ $siswa->name }}</td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td> : {{ $siswa->nisn }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td> : {{ $siswa->kelas }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> : {{ $siswa->email }}</td>
                                </tr>
                                <tr>
                                    <td>No Hp</td>
                                    <td> : {{ $siswa->nohp }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td> : {{ $siswa->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>hobi</td>
                                    <td> : {{ $siswa->hobi }}</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <h4>Kegiatan yang diikuti</h4>
                    <div class="col-md-12">
                        <table class="table table-sm">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Kegiatan</th>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
