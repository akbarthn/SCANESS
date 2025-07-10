<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = ['nama', 'start', 'end'];

    // Relasi ke jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
