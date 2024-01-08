@extends('layouts.app')
@section('title', 'Anggota')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Anggota</h4><br>
                    <div class="col-lg-3">
                        <form action="{{ route('angota.cetak') }}" method="POST">
                            @csrf
                            <div class="input-group d-flex justify-content-end">
                                <select name="kelas" class="form-control" aria-describedby="button-addon2" id="">
                                    <option value="semua">Semua</option>
                                    <option value="X">Kelas X</option>
                                    <option value="XI">Kelas XI</option>
                                    <option value="XII">Kelas XII</option>
                                </select>
                                <div class="input-group-append" id="button-addon2">
                                    <button type="submit" target="blank" class="btn btn-outline-primary" type="button"><i
                                            data-feather='printer'></i></button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    </div>
@endsection
@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
