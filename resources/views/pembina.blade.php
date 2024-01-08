<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="font-weight-bolder mb-0">{{ $siswa }}</h2>
                <p class="card-text">Angota</p>
            </div>
            <div class="avatar bg-light-primary p-50 m-0">
                <div class="avatar-content">
                    <i data-feather="users" class="font-medium-5"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="font-weight-bolder mb-0">{{ $daftar }} / {{ $ekskul->kuota }}</h2>
                <p class="card-text">Pendaftaran</p>
            </div>
            <div class="avatar bg-light-primary p-50 m-0">
                <div class="avatar-content">
                    <i data-feather="cpu" class="font-medium-5"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h4>Jadwal Ekstrakulikuler - {{ $ekskul->nama_ekskul }}</h4>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($jadwal as $item)
                    <li>
                        {{ $item->hari }} : {{ $item->jam_mulai }} s/d {{ $item->jam_selesai }} <br>
                        Lokasi : {{ $item->lokasi }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
