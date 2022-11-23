<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    use HasFactory;

    protected $table = 'spp';
    protected $primaryKey = 'id_spp';
    public $timestamps = false;

    protected $fillable = [
        'id_spp',
        'tahun',
        'nominal',
    ];

    public function siswa() {
        return $this->hasMany(Siswa::class, 'spp_id', 'id_spp');
    }
}
