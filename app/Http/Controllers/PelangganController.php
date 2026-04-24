<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:pelanggan'
        ]);

        Pelanggan::create($validated);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function show(Pelanggan $pelanggan)
    {
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:pelanggan,email,' . $pelanggan->id_pelanggan . ',id_pelanggan'
        ]);

        $pelanggan->update($validated);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus');
    }

    // PROFIL USER LOGIN
    public function profile()
    {
        $pelanggan = Pelanggan::find(session('pelanggan_id'));

        return view('profile', compact('pelanggan'));
    }

    public function updateProfile(Request $request)
    {
        $pelanggan = Pelanggan::find(session('pelanggan_id'));

        $pelanggan->nama = $request->nama;
        $pelanggan->email = $request->email;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;

        $pelanggan->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
