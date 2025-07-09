<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'tanggal',
        'id_shift', // sesuaikan jika kamu pakai 'id_shift'
        'id_user',  // sesuaikan jika kamu pakai 'id_user'
        'masuk',
        'keluar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
