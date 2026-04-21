<?php

namespace App\Http\Controllers;

use App\Models\Batik;
use Illuminate\Http\Request;

class BatikController extends Controller
{
    public function index()
    {
        $batik = Batik::all();
        return view('batik.index', compact('batik'));
    }

    public function create()
    {
        return view('batik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_batik' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar_batik' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar_batik')) {
            $path = $request->file('gambar_batik')->store('batik', 'public');
            $validated['gambar_batik'] = $path;
        }

        Batik::create($validated);
        return redirect()->route('batik.index')->with('success', 'Batik berhasil ditambahkan');
    }

    public function show($id)
    {
        $batik = \App\Models\Batik::where('id_batik', $id)->firstOrFail();
        return view('batik.detail', compact('batik'));
    }

    public function edit(Batik $batik)
    {
        return view('batik.edit', compact('batik'));
    }

    public function update(Request $request, Batik $batik)
    {
        $validated = $request->validate([
            'nama_batik' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar_batik' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar_batik')) {
            $path = $request->file('gambar_batik')->store('batik', 'public');
            $validated['gambar_batik'] = $path;
        }

        $batik->update($validated);
        return redirect()->route('batik.index')->with('success', 'Batik berhasil diperbarui');
    }

    public function destroy(Batik $batik)
    {
        if ($batik->gambar_batik) {
            \Storage::disk('public')->delete($batik->gambar_batik);
        }
        $batik->delete();
        return redirect()->route('batik.index')->with('success', 'Batik berhasil dihapus');
    }

    public function koleksi()
    {
        $batiks = \App\Models\Batik::all();
        return view('batik', compact('batiks'));
    }

}
