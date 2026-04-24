@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="container">

    <div class="card p-4">

        <h3 class="text-danger mb-3">Detail Pembayaran</h3>

        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>
        <p><strong>Metode:</strong> {{ strtoupper($order->payment_method) }}</p>

        <div class="batik-divider"></div>

        <h5>Produk:</h5>

        @foreach($order->items as $item)
            <div class="d-flex justify-content-between">
                <span>{{ $item->product->nama_batik }} ({{ $item->quantity }})</span>
                <span>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
            </div>
        @endforeach

        <div class="batik-divider"></div>

        <h4>Total Bayar: 
            <span class="text-danger">
                Rp {{ number_format($order->total_price, 0, ',', '.') }}
            </span>
        </h4>

        <div class="batik-divider"></div>

        {{-- INSTRUKSI PEMBAYARAN --}}
        @if($order->payment_method == 'transfer')

            <div class="alert alert-warning">
                <b>Transfer ke:</b><br>
                Bank BCA: 123456789<br>
                a.n Custom Batik
            </div>

        @elseif($order->payment_method == 'ewallet')

            <div class="alert alert-warning">
                <b>E-Wallet:</b><br>
                Dana / OVO / GoPay<br>
                No: 08123456789
            </div>

        @elseif($order->payment_method == 'cod')

            <div class="alert alert-success">
                Bayar di tempat (COD) saat barang diterima
            </div>

        @endif

        <a href="/orders" class="btn btn-danger mt-3">
            Lihat Pesanan Saya
        </a>

    </div>

</div>

@endsection