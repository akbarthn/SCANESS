<?php

namespace App\Models;

use App\Models\User;
use App\Models\Shift;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['id_user', 'id_shift', 'tanggal'];

    protected $casts = [
        'tanggal' => 'date', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'id_shift');
    }
}
