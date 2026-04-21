<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Batik;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // CHECKOUT (GET + POST)
    public function checkout(Request $request)
    {
        // GET (TAMPIL HALAMAN)
        if ($request->isMethod('get')) {

            // KASUS 1: PESAN SEKARANG
            if ($request->product_id) {

                $product = Batik::where('id_batik', $request->product_id)->first();

                if (!$product) {
                    return redirect('/')->with('error', 'Produk tidak ditemukan');
                }

                $items = collect([
                    (object)[
                        'product' => $product,
                        'quantity' => $request->qty
                    ]
                ]);

                return view('checkout', compact('items'));
            }

            // KASUS 2: DARI CART
            $cart = Cart::where('user_id', session('pelanggan_id'))->first();

            if (!$cart) {
                return redirect('/cart')->with('error', 'Keranjang kosong');
            }

            $items = CartItem::with('product')
                ->where('cart_id', $cart->id)
                ->get();

            return view('checkout', compact('items'));
        }

        // POST (PROSES BAYAR)
        $cart = Cart::where('user_id', session('pelanggan_id'))->first();

        if (!$cart) {
            return redirect('/cart')->with('error', 'Keranjang kosong');
        }

        $items = CartItem::with('product')
            ->where('cart_id', $cart->id)
            ->get();

        if ($items->isEmpty()) {
            return redirect('/cart')->with('error', 'Keranjang kosong');
        }

        // hitung total
        $total = 0;
        foreach ($items as $item) {
            $total += $item->product->harga * $item->quantity;
        }

        // simpan order
        $order = Order::create([
            'user_id' => session('pelanggan_id'),
            'total_price' => $total,
            'status' => 'dikemas',
            'payment_method' => $request->payment_method ?? 'transfer',
            'payment_status' => 'sudah bayar'
        ]);

        // simpan item
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->harga
            ]);
        }

        // kosongkan cart
        CartItem::where('cart_id', $cart->id)->delete();

        return redirect('/orders')->with('success', 'Pembayaran berhasil');
    }

    // LIST ORDER
    public function index()
    {
        $orders = Order::where('user_id', session('pelanggan_id'))->get();

        return view('orders', compact('orders'));
    }

    // STATUS DIKIRIM 
    public function kirim($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'dikirim';
        $order->save();

        return back()->with('success', 'Pesanan dikirim');
    }

    // STATUS SELESAI
    public function selesai($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'selesai';
        $order->save();

        return back()->with('success', 'Pesanan selesai');
    }

    // HALAMAN DETAIL CHECKOUT
    public function checkoutDetail(Request $request)
    {
        // ambil dari "Pesan Sekarang"
        if ($request->product_id) {
            $product = \App\Models\Batik::where('id_batik', $request->product_id)->first();

            $items = collect([
                (object)[
                    'product' => $product,
                    'quantity' => $request->qty
                ]
            ]);

            return view('checkout_detail', compact('items'));
        }

        // ambil dari cart
        $cart = Cart::where('user_id', session('pelanggan_id'))->first();

        $items = CartItem::with('product')
            ->where('cart_id', $cart->id)
            ->get();

        return view('checkout_detail', compact('items'));
    }


    // PROSES PEMBAYARAN
    public function processCheckout(Request $request)
    {
        $cart = Cart::where('user_id', session('pelanggan_id'))->first();

        $items = CartItem::with('product')
            ->where('cart_id', $cart->id)
            ->get();

        $total = 0;
        foreach ($items as $item) {
            $total += $item->product->harga * $item->quantity;
        }

        $order = Order::create([
            'user_id' => session('pelanggan_id'),
            'total_price' => $total,
            'status' => 'dikemas',
            'payment_method' => $request->payment_method,
            'payment_status' => 'sudah bayar'
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->harga
            ]);
        }

        CartItem::where('cart_id', $cart->id)->delete();

        return redirect('/orders')->with('success', 'Pembayaran berhasil');
    }
}