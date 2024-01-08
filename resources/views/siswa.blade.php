<div class="col-lg-12 col-12">
    <div class="card">
        <div class="card-header">
            <h4>Pengumuman</h4>
        </div>
        <div class="card-body">
            @foreach ($data as $item)
                <i class="size-60" data-feather='volume-2'></i>
                <a
                    href="{{ route('pengumuman.show', $item->id) }}">{{ $item->ekskul->nama_ekskul ?? 'Pengumuman' }}</a><br>
                <p>
                    {{ $item->isi }}
                </p>
                @if ($item->id_ekskul == null)
                    <span class="badge badge-danger">
                        Created By: {{ $item->created_by }}
                    </span>
                @else
                    <span class="badge badge-primary">
                        Created By: {{ $item->created_by }}
                    </span>
                @endif
                <div class="divider divider-right">
                    <div class="divider-text">{{ $item->created_at->diffforHumans() }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
