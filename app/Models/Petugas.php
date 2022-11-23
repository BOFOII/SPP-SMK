<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petugas extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_petugas';
    public $timestamps = false;
    protected $fillable = [
        'id_petugas',
        'username',
        'password',
        'nama_petugas',
        'level',
    ];

    public function pembayaran() {
        return $this->hasMany(Pembayaran::class);
    }
}
