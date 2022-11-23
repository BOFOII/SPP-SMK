<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Siswa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if($request->has('login_type') && $request->login_type == true) {
            return $this->login_siswa($request);
        } else {
            return $this->login_petugas($request);
        }
    }

    private function login_petugas(Request $request)
    {
        $credential = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', "Berhasil login");
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    private function login_siswa(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $siswa = Siswa::where('nisn', $request->username)->where('no_telp', $request->password)
        ->first();
        if(Auth::guard('siswa')->loginUsingId($siswa->nisn)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', "Berhasil login");
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'))->with('success', 'Berhasil keluar');
    }
}
