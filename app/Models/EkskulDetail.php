<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EkskulDetail extends Model
{
    use HasFactory;
    protected $table = "detail_ekskuls";
    protected $guarded = [];

    public function scopeJadwal($query, $ekskulId)
    {
        return $query->where('id_ekskul', $ekskulId);
    }
}
