<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetugasRequest;
use App\Models\Petugas;
use Exception;
use Illuminate\Http\Request;

class PetugasController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function __invoke()
    {
        $data = [
            'employees' => Petugas::all(),
        ];
        return view('petugas', $data);
    }

    public function store(PetugasRequest $request)
    {
        try {
            Petugas::create($request->validated());
            return back()->with('success', 'Berhasil menambahkan data petugas');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function edit(PetugasRequest $request)
    {
        try {
            Petugas::where('id_petugas', $request->route()->parameter('id_petugas'))->update($request->validated());
            return back()->with('success', 'Berhasil menambahkan data petugas');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            Petugas::where('id_petugas', $request->route()->parameter('id_petugas'))->delete();
            return back()->with('success', 'Berhasil menghapus data petugas');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
}
