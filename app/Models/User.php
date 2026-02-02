<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengguna';

    /**
     * The name of the "remember token" column.
     *
     * @var string
     */
    protected $rememberTokenName = 'token_ingat';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'nama_depan',
        'nama_belakang',
        'email',
        'kata_sandi',
        'jenis_kelamin',
        'telepon',
        'alamat',
        'foto_profil',
        'jenis_kulit',
        'warna_kulit',
        'masalah_kulit',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'kata_sandi',
        'token_ingat',
    ];

    /**
     * Get the password attribute name for authentication.
     */
    public function getAuthPasswordName(): string
    {
        return 'kata_sandi';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_terverifikasi' => 'datetime',
            'kata_sandi' => 'hashed',
        ];
    }

    /**
     * Get all reservasi for the pengguna.
     */
    public function reservasi(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Reservasi::class, 'id_pengguna');
    }

    /**
     * Get all konsultasi for the pengguna.
     */
    public function konsultasi(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Konsultasi::class, 'id_pengguna');
    }

    /**
     * Get all laporan for the admin.
     */
    public function laporan(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Laporan::class, 'id_admin');
    }
}
