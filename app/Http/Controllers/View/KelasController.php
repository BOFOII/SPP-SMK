<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use Exception;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function __invoke()
    {
        $data = [
            'classes' => Kelas::all(),
        ];
        return view('kelas', $data);
    }

    public function store(KelasRequest $request)
    {
        try {
            Kelas::create($request->validated());
            return back()->with('success', 'Berhasil menambahkan data kelas');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function edit(Request $request)
    {
        try {
            Kelas::where('id_kelas', $request->route()->parameter('id_kelas'))->update($request->validated());
            return back()->with('success', 'Berhasil mengubah data kelas');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            Kelas::where('id_kelas', $request->route()->parameter('id_kelas'))->delete();
            return back()->with('success', "Berhasil menghapus data kelas");
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
}
