<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaRequest;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SPP;
use Exception;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct()
    {
        // admin & petugas
    }

    public function __invoke()
    {
        $data = [
            'students' => Siswa::join('kelas', 'siswa.kelas_id', '=', 'kelas.id_kelas')->get(),
            'classes' => Kelas::all(),
            'spps' => SPP::all()
        ];
        return view('siswa', $data);
    }

    public function store(SiswaRequest $request)
    {
        try {
            Siswa::create($request->validated());
            return back()->with('success', 'Berhasil menambahkan data siswa');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function edit(SiswaRequest $request)
    {
        try {
            Siswa::where('nisn', $request->route()->parameter('nisn'))->update($request->validated());
            return back()->with('success', 'Berhasil mengubah data siswa');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            Siswa::where('nisn', $request->route()->parameter('nisn'))->delete();
            return back()->with('success', 'Berhasil menghapus data siswa');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
}
