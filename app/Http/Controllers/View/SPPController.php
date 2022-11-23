<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\SPPRequest;
use App\Models\SPP;
use Exception;
use Illuminate\Http\Request;

class SPPController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function __invoke()
    {
        $data = [
            'spps' => SPP::all(),
        ];
        return view('spp', $data);
    }

    public function store(SPPRequest $request)
    {
        try {
            SPP::create($request->validated());
            return back()->with('success', 'Berhasil menambahkan data spp');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function edit(SPPRequest $request)
    {
        try {
            SPP::where('id_spp', $request->route()->parameter('id_spp'))->update($request->validated());
            return back()->with('success', 'Berhasil mengubah data spp');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            SPP::where('id_spp', $request->route()->parameter('id_spp'))->delete();
            return back()->with('success', 'Berhasil menghapus data spp');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
}
