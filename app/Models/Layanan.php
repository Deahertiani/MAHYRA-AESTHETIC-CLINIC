<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'layanan';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_perawatan',
    ];

    /**
     * Get all reservasi for the layanan.
     */
    public function reservasi(): HasMany
    {
        return $this->hasMany(Reservasi::class, 'id_layanan');
    }
}
