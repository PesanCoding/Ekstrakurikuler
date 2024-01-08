<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />

    <style>
        .tabledat {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .thdat {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>
    <table class="tabledat">
        <tr>
            <th width="1%" class="thdat">No</th>
            <th class="thdat">Nama Lengkap</th>
            <th class="thdat">NISN</th>
            <th class="thdat">Kelas</th>
            <th class="thdat">No Hp</th>

        </tr>
        @foreach ($data as $item)
            <tr>
                <td class="thdat">{{ $loop->iteration }}</td>
                <td class="thdat">{{ $item->user->name }}</td>
                <td class="thdat">{{ $item->user->nisn }}</td>
                <td class="thdat">{{ $item->user->kelas }}</td>
                <td class="thdat">{{ $item->user->nohp }}</td>
            </tr>
        @endforeach
    </table>

    </div>
</body>

</html>
