<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function profile()
    {
        $pelanggan = Pelanggan::find(session('pelanggan_id'));

        if (!$pelanggan) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        return view('profile', compact('pelanggan'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $pelanggan = Pelanggan::find(session('pelanggan_id'));

        if (!$pelanggan) {
            return redirect('/login');
        }

        $pelanggan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->nomor_telepon,
            'alamat' => $request->alamat,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}