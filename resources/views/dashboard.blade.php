@extends('layouts.app')
@if (auth()->user()->hasRole('admin'))
    @section('title', 'Dashboard')
    @section('breadcrumb')
        @parent
        <li class="breadcrumb-item active">@yield('title')</li>
    @endsection
    @section('content')
    @endsection
@endif

@if (auth()->user()->hasRole('siswa'))
    @section('title', 'Dashboard Siswa')
    @section('breadcrumb')
        @parent
        <li class="breadcrumb-item active">@yield('title')</li>
    @endsection
    @section('content')
    @endsection
@endif
