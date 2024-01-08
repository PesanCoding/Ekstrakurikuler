@extends('layouts.app')
@section('title', 'Profile')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Profile - {{ $data->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <table class="table table-sm">
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nisn</td>
                                    <td>: {{ $data->nisn }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>: {{ $data->kelas }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: {{ $data->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td>No Hp</td>
                                    <td>: {{ $data->nohp }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ $data->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Hobi</td>
                                    <td>: {{ $data->hobi }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('profil.edit', $data->id) }}" class="btn btn-sm btn-warning"><i
                            data-feather='edit'></i> Edit
                        Profile</a>
                    <a href="" class="btn btn-sm btn-info"><i data-feather='lock'></i> Ubah Password</a>
                </div>
            </div>
        </div>
    </div>
@endsection
