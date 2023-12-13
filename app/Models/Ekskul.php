<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ekskul extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Ekskul
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'penanggung_jawab', 'id');
    }

    /**
     * Get all of the comments for the EkskulDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailEkskul(): HasMany
    {
        return $this->hasMany(EkskulDetail::class, 'id_ekskul', 'id');
    }
}
