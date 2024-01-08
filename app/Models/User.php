<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function Detailsiswa(): HasMany
    {
        return $this->hasMany(Siswa::class, 'id_user', 'id');
    }
    public function pembina()
    {
        return $this->hasOne(Ekskul::class, 'penanggung_jawab', 'id')
            ->withDefault(
                ['nama_ekskul' => 'Belum ditentukan']
            );
    }
    public function scopePembinaData($query)
    {
        return $query->where('id', auth()->user()->id)
            ->role('pembina')
            ->with('pembina')
            ->get();
    }
    public function scopeSiswaData($query)
    {
        return $query->role('siswa')->orderBy('name', 'asc');
    }

    public function scopeDeletePhotoProfile($query, $path)
    {
        if ($path != null && Storage::exists($path)) {
            Storage::delete($path);
        }

        return $query;
    }
}
