@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="container">

    <div class="card p-4 mb-4">

        <h4 class="mb-3 text-danger">Checkout</h4>

        <!-- 🔥 DATA PELANGGAN (AUTO, TANPA INPUT) -->
        <h5 class="text-danger">Data Pembeli</h5>

        <p><strong>Nama:</strong> {{ $pelanggan->nama }}</p>
        <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
        <p><strong>No HP:</strong> {{ $pelanggan->no_hp }}</p>

        <a href="/profile" class="btn btn-sm btn-warning mb-3">
            Edit Profil
        </a>

        <div class="batik-divider"></div>

        <!-- 🔥 PRODUK -->
        <h5 class="text-danger">Produk</h5>

        @php $total = 0; @endphp

        @foreach($items as $item)
            @php 
                $subtotal = $item->product->harga * $item->quantity;
                $total += $subtotal;
            @endphp

            <div class="d-flex justify-content-between mb-2">
                <span>{{ $item->product->nama_batik }} ({{ $item->quantity }})</span>
                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
        @endforeach

        <div class="batik-divider"></div>

        <!-- 🔥 TOTAL -->
        <h5>Total: Rp {{ number_format($total, 0, ',', '.') }}</h5>

        <div class="batik-divider"></div>

        <!-- 🔥 FORM PEMBAYARAN -->
        <form action="/checkout/process" method="POST">
            @csrf

            <h5 class="text-danger">Metode Pembayaran</h5>

            <select name="payment_method" class="form-select mb-3" required>
                <option value="">-- Pilih Metode Pembayaran --</option>
                <option value="transfer">Transfer Bank</option>
                <option value="ewallet">E-Wallet</option>
                <option value="cod">COD</option>
            </select>

            <button class="btn btn-danger w-100">
                Bayar Sekarang
            </button>

        </form>

    </div>

</div>

@endsection