<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Konsultasi extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'konsultasi';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_pengguna',
        'pengirim',
        'pesan',
    ];

    /**
     * Get the pengguna that owns the konsultasi.
     */
    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}
