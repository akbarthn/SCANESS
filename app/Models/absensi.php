<?php

namespace App\Models;


use App\Models\User;
use App\Models\Shift;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi'; 
    protected $fillable = ['id_user', 'id_shift', 'tanggal','jam_masuk','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
