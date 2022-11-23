<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class Siswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = [
        'nisn',
        'nis',
        'nama',
        'kelas_id',
        'alamat',
        'no_telp',
        'spp_id',
        'password',
    ];

    protected $primaryKey = 'nisn';
    public $timestamps = false;

    public function pembayaran() {
        return $this->hasMany(Pembayaran::class, 'nisn', 'nisn');
    }

    public function spp()
    {
        return $this->belongsTo(SPP::class, 'spp_id', 'id_spp');
    }

    public function kelas() {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }
}
