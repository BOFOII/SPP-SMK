<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kelas';
    public $timestamps = false;
    protected $fillable = [
        'id_kelas',
        'nama_kelas',
        'kompetensi_keahlian'
    ];

    public function siswa() {
        return $this->hasMany(Siswa::class, 'spp_id', 'id_spp');
    }
}
