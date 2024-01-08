<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengumuman extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "pengumumen";

    public function ekskul(): BelongsTo
    {
        return $this->belongsTo(Ekskul::class, 'id_ekskul', 'id');
    }

    public function scopeUnreadByEkskulIds($query, $ekskulIds)
    {
        return $query->where('read_at', 0)
            ->whereIn('id_ekskul', $ekskulIds)
            ->orWhereNull('id_ekskul')
            ->orderBy('id', 'DESC');
    }
}
