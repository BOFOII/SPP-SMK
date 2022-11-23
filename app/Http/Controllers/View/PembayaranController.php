<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\SPP;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    public function __construct()
    {
        // petugas & admin
    }

    public function __invoke()
    {
        $siswa = Siswa::all();
        $transactions = [];
        $bulan = [
            'Jan' => 'Januari',
            'Feb' => 'Februari',
            'Mar' => 'Maret',
            'Apr' => 'April',
            'Mei' => 'Mei',
            'Jun' => 'Juni',
            'Jul' => 'July',
            'Aug' => 'Agustus',
            'Sep' =>'September',
            'Oct' =>'Oktober',
            'Nov' => 'November',
            'Dec' =>'Desember',
        ];
        $tahun = [
            2019,
            2020,
            2021,
            2022,
            2023,
            2024,
            2025,
        ];
        if(auth('spp')->user()->level == 'petugas')
        {
            $transactions = Pembayaran::with(['petugas', 'siswa'])->where('petugas_id', auth('spp')->user()->id_petugas)->get();
        } else {
            $transactions = Pembayaran::with(['petugas', 'siswa'])->get();
        }
        return view('pembayaran', compact(['siswa', 'transactions', 'bulan', 'tahun']));
    }

    public function store(PembayaranRequest $request)
    {
        try {
            $nisn = $request->validated('nisn');
            $tgl_bayar = $request->validated('tgl_bayar');
            $tahun_bayar = $request->validated('tahun_bayar');

            $spp_id = Siswa::where('nisn', $nisn)->select('spp_id')->first()->spp_id;
            $nom_harga = SPP::where('id_spp', $spp_id)->select('nominal')->first()->nominal;

            foreach($request->bulan_bayar as $bulan) {
                Pembayaran::create([
                    'petugas_id' => auth('spp')->user()->id_petugas,
                    'nisn' => $nisn,
                    'tgl_bayar' => $tgl_bayar,
                    'bulan_bayar' => $bulan,
                    'tahun_bayar' => $tahun_bayar,
                    'spp_id' => $spp_id,
                    'jumlah_bayar' => $nom_harga
                ]);
            }

            return back()->with('success', 'Berhasil menambahkan data pembayaran');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function hitungPembayaran(Request $request)
    {
        $harga = 0;
        $message = '';
        $code = 0; // 0 for true, 1 for validation, 2 for data not found
        try {
            $validator = Validator::make($request->all(), [
                'nisn' => ['required'],
                'bulan_bayar' => ['required'],
            ]);
            if($validator->fails()) {
                throw new Exception('nisn required', 1);
            }
            $nisn = $request->nisn;
            $spp = Siswa::with('spp')->where('nisn', $nisn)->select('spp_id')->first();
            $nominal = SPP::where('id_spp', $spp->spp_id)->first()->nominal;
            // jumlah bayar x nominal
            $harga = $request->bulan_bayar * $nominal;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            $code = $ex->getCode();
        } finally {
            return response()->json([
                'harga' => $harga,
                'code' => $code,
                'message' => $message,
            ]);
        }
    }

    public function edit(PembayaranRequest $request)
    {
        try {
            $nisn = $request->validated('nisn');
            $tgl_bayar = $request->validated('tgl_bayar');
            $tahun_bayar = $request->validated('tahun_bayar');

            $spp_id = Siswa::where('nisn', $nisn)->select('spp_id')->first()->spp_id;
            $nom_harga = SPP::where('id_spp', $spp_id)->select('nominal')->first()->nominal;

            // foreach($request->bulan_bayar as $bulan) {
            //     Pembayaran::create([
            //         'petugas_id' => auth('spp')->user()->id_petugas,
            //         'nisn' => $nisn,
            //         'tgl_bayar' => $tgl_bayar,
            //         'bulan_bayar' => $bulan,
            //         'tahun_bayar' => $tahun_bayar,
            //         'spp_id' => $spp_id,
            //         'jumlah_bayar' => $nom_harga
            //     ]);
            // }

            return back()->with('success', 'Berhasil menambahkan data pembayaran');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        Pembayaran::where('id_pembayaran', $request->route('id_pembayaran'))->delete();
        return back()->with('success', 'Berhasil menghapus data pembayaran');
    }
}
