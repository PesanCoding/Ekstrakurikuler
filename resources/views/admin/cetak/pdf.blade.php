<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Laporan pembayaran SPP</title>

</head>

<body>

    <style>
        .page-break {
            page-break-after: always;
        }

        .text-center {
            text-align: center;
        }

        .text-header {
            font-size: 1.1rem;
        }

        .size2 {
            font-size: 1.4rem;
        }

        .border-bottom {
            border-bottom: 1px black solid;
        }

        .border {
            border: 2px block solid;
        }

        .border-top {
            border-top: 1px black solid;
        }

        .float-right {
            float: right;
        }

        .mt-4 {
            margin-top: 4px;
        }

        .mx-1 {
            margin: 1rem 0 1rem 0;
        }

        .mr-1 {
            margin-right: 1rem;
        }

        .mt-1 {
            margin-top: 1rem;
        }

        ml-2 {
            margin-left: 2rem;
        }

        .ml-min-5 {
            margin-left: -5px;
        }

        .text-uppercase {
            font: uppercase;
        }

        .d1 {
            font-size: 2rem;
        }

        .img {
            position: absolute;
        }

        .link {
            font-style: underline;
        }

        .text-desc {
            font-size: 14px;
        }

        .text-bold {
            font-style: bold;
        }

        .underline {
            text-decoration: underline;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #fff;
        }
    </style>

    <!-- header -->
    <div class="text-center">
        <img src="{{ public_path('template/src/logo.jpg') }}" class="img" alt="logo.png" width="120">
        <div style="margin-left:6rem;">
            <span class="text-header text-bold text-danger">
                YAYASAN PENDIDIKAN BINA INSANI <br>
                <span class="size2">SMKS BINA INSANI</span> <br>
                SEKOLAH MENENGAH KEJURUAN BINA INSANI PINANG <br>
            </span>
            <span class="text-desc">Jalan H. Mansur No. 3 Telepon (0219) 2407871<br>FAX (0233) 319238 Website <span
                    class="underline">smksbinainsani@gmail.com</span> - Email <span
                    class="underline">http://smksbinainsani.sch.id</span> <br> Desa Neroktog Kec. Pinang Kota
                Tangerang-Banten 15402 <br> </span>
        </div>
    </div>
    <div>
        <hr class="border">

        <div class="size2 text-center mb-2">LAPORAN EKSTRAKULIKULER SISWA</div>

        <table class="table-center mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nisn</th>
                    <th>Kelas</th>
                    <th>Ekskul</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->user->nisn }}</td>
                        <td>{{ $item->user->kelas }}</td>
                        <td>{{ $item->ekskul->nama_ekskul }}</td>
                    </tr>
                @endforeach
            </tbody>


        </table>
        <!-- /content -->

        <!-- footer -->
        <div>Pembuat : {{ auth()->user()->name }}</div>
        <!-- /footer -->
</body>

</html>
