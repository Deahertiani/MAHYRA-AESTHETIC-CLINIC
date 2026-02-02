<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatReservasi extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'riwayat_reservasi';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_reservasi',
        'tanggal',
        'status_perawatan',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Get the reservasi that owns the riwayat.
     */
    public function reservasi(): BelongsTo
    {
        return $this->belongsTo(Reservasi::class, 'id_reservasi');
    }
}
