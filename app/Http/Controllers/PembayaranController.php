<?php

namespace App\Http\Controllers;

use App\Models\PembayaranCustomBatik;
use App\Models\CustomOrder;
use App\Models\Admin;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = PembayaranCustomBatik::with(['customOrder', 'admin'])->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $orders = CustomOrder::whereDoesntHave('pembayaran')->get();
        $admin = Admin::all();
        return view('pembayaran.create', compact('orders', 'admin'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_custom' => 'required|exists:custom_order,id_custom',
            'id_admin' => 'required|exists:admin,id_admin',
            'tgl' => 'required|date',
            'total_harga' => 'required|numeric',
            'metode_pembayaran' => 'nullable|in:transfer,tunai,kartu_kredit'
        ]);

        PembayaranCustomBatik::create($validated);

        // Update status order menjadi dibayar
        CustomOrder::find($validated['id_custom'])->update(['status' => 'dibayar']);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dicatat');
    }

    public function show(PembayaranCustomBatik $pembayaran)
    {
        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit(PembayaranCustomBatik $pembayaran)
    {
        $orders = CustomOrder::all();
        $admin = Admin::all();
        return view('pembayaran.edit', compact('pembayaran', 'orders', 'admin'));
    }

    public function update(Request $request, PembayaranCustomBatik $pembayaran)
    {
        $validated = $request->validate([
            'id_custom' => 'required|exists:custom_order,id_custom',
            'id_admin' => 'required|exists:admin,id_admin',
            'tgl' => 'required|date',
            'total_harga' => 'required|numeric',
            'metode_pembayaran' => 'nullable|in:transfer,tunai,kartu_kredit'
        ]);

        $pembayaran->update($validated);
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui');
    }

    public function destroy(PembayaranCustomBatik $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus');
    }
}
