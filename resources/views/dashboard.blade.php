@push('css')
    <style>
        .size-60 {
            width: 40px;
            height: 40px;
        }
    </style>
@endpush
@extends('layouts.app')
@if (auth()->user()->hasRole('admin'))
    @section('title', 'Dashboard')
    @section('breadcrumb')
        @parent
        <li class="breadcrumb-item active">@yield('title')</li>
    @endsection
    @section('content')
        <div class="row">
            @includeIf('admin')
        </div>
    @endsection
@endif

@if (auth()->user()->hasRole('siswa'))
    @section('title', 'Dashboard Siswa')
    @section('breadcrumb')
        @parent
        <li class="breadcrumb-item active">@yield('title')</li>
    @endsection
    @section('content')
        <div class="row">
            @includeIf('siswa')
        </div>
    @endsection
@endif
@if (auth()->user()->hasRole('pembina'))
    @section('title', 'Dashboard pembina')
    @section('breadcrumb')
        @parent
        <li class="breadcrumb-item active">@yield('title')</li>
    @endsection
    @section('content')
        <div class="row">
            @includeIf('pembina')
        </div>
    @endsection
@endif
