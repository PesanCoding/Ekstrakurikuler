<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = "pendaftarans";
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_siswa', 'id');
    }

    public function ekskul(): BelongsTo
    {
        return $this->belongsTo(Ekskul::class, 'id_ekskul', 'id');
    }
    
    public function scopeBelumDisetujui($query, $dataPembina)
    {
        return $query->where('id_ekskul', $dataPembina)
            ->where('status_pendaftran', 'belum disetujui');
    }

    public function scopeEkskulSetujuByIdSiswa($query, $id)
    {
        return $query->where('id_siswa', $id)
            ->where('status_pendaftran', 'setuju');
    }

    public function scopeIsAlreadyRegistered($query, $idSiswa, $idEkskul)
    {
        return $query->where('id_siswa', $idSiswa)
            ->where('id_ekskul', $idEkskul)
            ->exists();
    }

    public function scopeJumlahEkskulSiswa($query, $idSiswa)
    {
        return $query->where('id_siswa', $idSiswa)->count();
    }

    public function scopeApprovedEkskulIdsBySiswaId($query, $siswaId)
    {
        return $query->where('status_pendaftran', 'setuju')
            ->where('id_siswa', $siswaId)
            ->pluck('id_ekskul')
            ->toArray();
    }

    public function scopeApprovedMembers($query, $ekskulId)
    {
        return $query->where('id_ekskul', $ekskulId)
            ->where('status_pendaftran', 'setuju');
    }


    public function scopePendingRegistrations($query, $ekskulId)
    {
        return $query->where('id_ekskul', $ekskulId)
            ->where('status_pendaftran', 'belum disetujui');
    }

    // filter cetak
    public function scopeFilterByEkskulAndKelas($query, $id, $kelas)
    {
        return $query
            ->where('status_pendaftran', 'setuju')
            ->when($id !== 'semua', function ($q) use ($id) {
                $q->where('id_ekskul', $id);
            })
            ->when($kelas !== 'semua', function ($q) use ($kelas) {
                $q->whereHas('user', function ($subquery) use ($kelas) {
                    $subquery->where('kelas', $kelas);
                });
            });
    }
}
