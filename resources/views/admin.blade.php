<div class="col-lg-12 col-12">
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title">Statistics</h4>
            <div class="d-flex align-items-center">
                <p class="card-text mr-25 mb-0">{{ $data['tanggal'] }}</p>
            </div>
        </div>
        <div class="card-body statistics-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12  mb-md-0">
                    <div class="media">
                        <div class="avatar bg-light-primary mr-2">
                            <div class="avatar-content">
                                <i data-feather="trending-up" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{ $data['data_pembina'] }}</h4>
                            <p class="card-text font-small-3 mb-0">Pembina Ekskul</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                    <div class="media">
                        <div class="avatar bg-light-info mr-2">
                            <div class="avatar-content">
                                <i data-feather="user" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{ $data['data_siswa'] }}</h4>
                            <p class="card-text font-small-3 mb-0">Total Siswa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="media">
                        <div class="avatar bg-light-danger mr-2">
                            <div class="avatar-content">
                                <i data-feather="box" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{ $data['data_ekskul'] }}</h4>
                            <p class="card-text font-small-3 mb-0">Jumlah Ekskul Aktif</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="media">
                        <div class="avatar bg-light-success mr-2">
                            <div class="avatar-content">
                                <i data-feather="dollar-sign" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">$9745</h4>
                            <p class="card-text font-small-3 mb-0">Revenue</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <span>{!! $chart->container() !!}</span>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
        </div>
    </div>
</div>
</div>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
