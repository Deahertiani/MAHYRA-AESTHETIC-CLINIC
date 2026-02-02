<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'laporan';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_admin',
        'bulan',
        'total_pendapatan',
        'total_pasien',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'total_pendapatan' => 'decimal:2',
        'total_pasien' => 'integer',
    ];

    /**
     * Get the admin that owns the laporan.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
