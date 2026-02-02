<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservasi extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'reservasi';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_pengguna',
        'id_layanan',
        'id_dokter',
        'nama_perawatan',
        'harga',
        'tanggal',
        'waktu',
        'status',
        'nama_pelanggan',
        'email_pelanggan',
        'telepon_pelanggan',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tanggal' => 'date',
        'harga' => 'integer',
    ];

    /**
     * Get the pengguna that owns the reservasi.
     */
    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    /**
     * Get the layanan for the reservasi.
     */
    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }

    /**
     * Get the dokter for the reservasi.
     */
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    /**
     * Get all riwayat for the reservasi.
     */
    public function riwayat(): HasMany
    {
        return $this->hasMany(RiwayatReservasi::class, 'id_reservasi');
    }

    /**
     * Get status color for display
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'menunggu' => 'bg-yellow-500',
            'dikonfirmasi' => 'bg-blue-400',
            'selesai' => 'bg-green-400',
            'dibatalkan' => 'bg-red-400',
            default => 'bg-gray-400',
        };
    }

    /**
     * Get formatted status for display
     */
    public function getStatusDisplayAttribute(): string
    {
        return match ($this->status) {
            'menunggu' => 'Menunggu',
            'dikonfirmasi' => 'Dikonfirmasi',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan',
            default => 'Unknown',
        };
    }

    /**
     * Check if reservation can be cancelled
     */
    public function getCanCancelAttribute(): bool
    {
        return in_array($this->status, ['menunggu', 'dikonfirmasi']);
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}
