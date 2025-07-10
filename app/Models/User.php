<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atribut yang boleh diisi massal (melalui create / update)
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'nomor_hp',
        'role',
    ];

    /**
     * Atribut yang disembunyikan saat diserialisasi
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting atribut
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Mendapatkan inisial nama pengguna
     *
     * @return string
     */
    public function initials(): string
    {
        return Str::of($this->nama)                  // Digunakan 'nama', bukan 'name'
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * Relasi: user memiliki banyak absensi
     */
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    /**
     * Relasi: user memiliki banyak jadwal
     */
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
