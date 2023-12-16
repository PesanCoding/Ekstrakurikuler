@extends('layouts.app')
@section('title', 'List Ekskul')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    @foreach ($list as $item)
        <div class="row match-height">
            <div class="col-lg-12 col-12">
                <div class="card card-revenue-budget">
                    <div class="row mx-0">
                        <div class="col-md-8 col-12 revenue-report-wrapper">
                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-50 mb-sm-0">{{ $item->nama_ekskul }}</h4>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                                        <span>Kuota : 60</span>
                                    </div>
                                    <span></span>
                                </div>
                            </div>
                            <div class="badge badge-glow badge-warning mb-1">
                                Pembina {{ $item->user->name }}
                            </div>
                            <div class="align-items-center">
                                <center>
                                    <img src="{{ asset('template/app-assets/images/slider/09.jpg') }}" width="300px"
                                        alt="">
                                </center>
                            </div>

                            <h5 class="mt-1">Deskripsi</h5>
                            <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error
                                aut ipsam corrupti distinctio
                                modi at facere repellat tempora repudiandae, nemo quaerat amet, harum, consequatur provident
                                impedit! Harum consectetur corporis nesciunt!</p>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="d-flex justify-content-center mt-2">
                                <h4>Jadwal Kegiatan</h4>
                            </div>
                            @foreach ($item->detailEkskul as $jadwal)
                                <ul>
                                    <li>
                                        {{ $jadwal->hari }} : {{ $jadwal->jam_mulai }} s/d {{ $jadwal->jam_selesai }} <br>
                                        Lokasi : {{ $jadwal->lokasi }}
                                    </li>
                                </ul>
                            @endforeach
                            <div class="d-flex justify-content-center mt-2 mb-2">
                                <button data-id="{{ $item->id }}" id="daftar-ekskul"
                                    class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal -->
    <div class="modal fade text-left" id="modal-daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Form Pendaftaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" name="id_siswa" value="{{ auth()->user()->name }}" class="form-control"
                            placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ekskul</label>
                        <input type="text" name="" id="nama_ekskul"class="form-control" readonly placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Alasan</label>
                        <textarea name="alasan" id="" class="form-control" cols="30" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('body').on('click', '#daftar-ekskul', function() {
            let = data_id = $(this).data('id');


            $.ajax({
                type: "GET",
                url: `/pendaftaran/${data_id}`,
                cache: false,
                success: function(response) {
                    console.log(response.data);
                    $('#nama_ekskul').val(response.data.nama_ekskul);
                    $('#modal-daftar').modal('show');
                }
            });
        })
    </script>
@endpush
