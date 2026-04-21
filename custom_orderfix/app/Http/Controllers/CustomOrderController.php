<?php

namespace App\Http\Controllers;

use App\Models\CustomOrder;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
    public function index()
    {
        $orders = CustomOrder::with('pelanggan')->get();
        return view('custom_order.index', compact('orders'));
    }

    public function create()
    {
        $pelangganId = session('pelanggan_id');
        $pelanggan = null;

        if ($pelangganId) {
            $pelanggan = Pelanggan::find($pelangganId);
        }

        return view('custom_order.create', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'nullable|exists:pelanggan,id_pelanggan',
            'nama' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'nomor_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jenis_batik' => 'nullable|string|max:100',
            'jenis_kain' => 'required|string|max:100',
            'teknik' => 'required|string|max:100',
            'teks_tambahan' => 'nullable|string',
        ]);

        // Jika user sudah login, gunakan id_pelanggan dari session
        if (session('pelanggan_id')) {
            $validated['id_pelanggan'] = session('pelanggan_id');
        } else {
            // Jika guest, buat pelanggan baru
            if ($validated['nama'] && $validated['email']) {
                $pelanggan = Pelanggan::create([
                    'nama' => $validated['nama'],
                    'email' => $validated['email'],
                    'nomor_telepon' => $validated['nomor_telepon'],
                    'alamat' => $validated['alamat'],
                ]);
                $validated['id_pelanggan'] = $pelanggan->id_pelanggan;
            }
        }

        CustomOrder::create($validated);
        return redirect()->route('custom_order.create')->with('success', 'Custom order berhasil ditambahkan! Kami akan menghubungi Anda segera.');
    }

    public function show(CustomOrder $customOrder)
    {
        return view('custom_order.show', compact('customOrder'));
    }

    public function edit(CustomOrder $customOrder)
    {
        $pelanggan = Pelanggan::all();
        return view('custom_order.edit', compact('customOrder', 'pelanggan'));
    }

    public function update(Request $request, CustomOrder $customOrder)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'jenis_batik' => 'nullable|string|max:100',
            'jenis_kain' => 'nullable|string|max:100',
            'teknik' => 'nullable|string|max:100',
            'teks_tambahan' => 'nullable|string',
            'status' => 'nullable|in:pending,proses,selesai,dibayar'
        ]);

        $customOrder->update($validated);
        return redirect()->route('custom_order.index')->with('success', 'Custom order berhasil diperbarui');
    }

    public function destroy(CustomOrder $customOrder)
    {
        $customOrder->delete();
        return redirect()->route('custom_order.index')->with('success', 'Custom order berhasil dihapus');
    }
}
