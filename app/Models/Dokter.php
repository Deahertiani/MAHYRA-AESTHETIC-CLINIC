<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokter extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'dokter';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_dokter',
    ];

    /**
     * Get all reservasi for the dokter.
     */
    public function reservasi(): HasMany
    {
        return $this->hasMany(Reservasi::class, 'id_dokter');
    }
}
