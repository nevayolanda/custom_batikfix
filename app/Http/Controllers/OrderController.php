<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Batik;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // =========================
    // HALAMAN CHECKOUT
    // =========================
    public function checkout(Request $request)
    {
        $pelanggan = Pelanggan::find(session('pelanggan_id'));

        // =========================
        // CASE: PESAN SEKARANG
        // =========================
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

            return view('checkout', compact('items', 'pelanggan'));
        }

        // =========================
        // CASE: DARI CART
        // =========================
        $cart = Cart::where('user_id', session('pelanggan_id'))->first();

        if (!$cart) {
            return redirect('/cart')->with('error', 'Keranjang kosong');
        }

        $items = CartItem::with('product')
            ->where('cart_id', $cart->id)
            ->get();

        return view('checkout', compact('items', 'pelanggan'));
    }


    // =========================
    // HALAMAN DETAIL CHECKOUT
    // =========================
    public function checkoutDetail(Request $request)
    {
        $pelanggan = Pelanggan::find(session('pelanggan_id'));

        // PESAN SEKARANG
        if ($request->product_id) {
            $product = Batik::where('id_batik', $request->product_id)->first();

            $items = collect([
                (object)[
                    'product' => $product,
                    'quantity' => $request->qty
                ]
            ]);

            return view('checkout_detail', compact('items', 'pelanggan'));
        }

        // DARI CART
        $cart = Cart::where('user_id', session('pelanggan_id'))->first();

        $items = CartItem::with('product')
            ->where('cart_id', $cart->id)
            ->get();

        return view('checkout_detail', compact('items', 'pelanggan'));
    }


    // =========================
    // PROSES PEMBAYARAN
    // =========================
    public function processCheckout(Request $request)
    {
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

        // HITUNG TOTAL
        $total = 0;
        foreach ($items as $item) {
            $total += $item->product->harga * $item->quantity;
        }

        // SIMPAN ORDER
        $order = Order::create([
            'user_id' => session('pelanggan_id'),
            'total_price' => $total,
            'status' => 'dikemas',
            'payment_method' => $request->payment_method,
            'payment_status' => 'sudah bayar'
        ]);

        // SIMPAN ITEM
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->harga
            ]);
        }

        // KOSONGKAN CART
        CartItem::where('cart_id', $cart->id)->delete();

        return redirect('/payment/' . $order->id);
    }


    // =========================
    // HALAMAN PAYMENT
    // =========================
    public function payment($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return view('payment', compact('order'));
    }


    // =========================
    // LIST ORDER
    // =========================
    public function index()
    {
        $orders = Order::where('user_id', session('pelanggan_id'))->get();

        return view('orders', compact('orders'));
    }


    // =========================
    // STATUS DIKIRIM
    // =========================
    public function kirim($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'dikirim';
        $order->save();

        return back()->with('success', 'Pesanan dikirim');
    }


    // =========================
    // STATUS SELESAI
    // =========================
    public function selesai($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'selesai';
        $order->save();

        return back()->with('success', 'Pesanan selesai');
    }
}