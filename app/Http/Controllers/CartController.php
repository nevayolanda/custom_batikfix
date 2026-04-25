<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    // tampilkan cart
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => session('pelanggan_id')
        ]);

        $items = CartItem::with('product')
            ->where('cart_id', $cart->id)
            ->get();

        return view('cart', compact('items'));
    }

    // tambah ke cart
    public function add($id)
    {
        $qty = request('qty') ?? 1;

        // VALIDASI MIN & MAX
        if ($qty < 3) {
            return back()->with('error', 'Minimum pembelian adalah 3');
        }

        if ($qty > 6) {
            return back()->with('error', 'Maksimum pembelian adalah 6');
        }

        // CARI / BUAT CART
        $cart = Cart::firstOrCreate([
            'user_id' => session('pelanggan_id')
        ]);

        // CEK ITEM SUDAH ADA BELUM
        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $id)
            ->first();

        if ($item) {
            // UPDATE QTY (tambah)
            $newQty = $item->quantity + $qty;

            // BATASI MAX 6
            if ($newQty > 6) {
                return back()->with('error', 'Maksimum total pembelian produk ini adalah 6');
            }

            $item->quantity = $newQty;
            $item->save();
        } else {
            // SIMPAN BARU
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $id,
                'quantity' => $qty
            ]);
        }

        return redirect('/cart')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }
}