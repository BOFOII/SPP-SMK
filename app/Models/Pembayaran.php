<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayatan';
    protected $fillable = [
        'id_pembayaran',
        'petugas_id',
        'nisn',
        'tgl_bayar',
        'bulan_bayar',
        'tahun_bayar',
        'spp_id',
        'jumlah_bayar'
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id', 'id_petugas');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
}
