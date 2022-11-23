<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\SPP;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke() {
        $data = [
            'count_siswa' => Siswa::count(),
            'count_pembayaran' => Pembayaran::where('petugas_id', auth()->user()->id_petugas)->count(),
            'count_kelas' => Kelas::count(),
            'count_spp' => SPP::count(),
            'count_petugas' => Petugas::count(),
        ];
        return view('home', $data);
    }
}
