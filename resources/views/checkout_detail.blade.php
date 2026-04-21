@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="container">

    <div class="card p-4 mb-4">
        <h4 class="mb-3 text-danger">Checkout</h4>

        <form action="/checkout/process" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="hp" class="form-control" required>
            </div>

            <div class="batik-divider"></div>

            <h4 class="text-danger">Produk</h4>

            @php $total = 0; @endphp

            @foreach($items as $item)
                @php 
                    $subtotal = $item->product->harga * $item->quantity;
                    $total += $subtotal;
                @endphp

                <div class="d-flex justify-content-between mb-2">
                    <span>{{ $item->product->nama_batik }} ({{ $item->quantity }})</span>
                    <span>Rp {{ number_format($subtotal) }}</span>
                </div>
            @endforeach

            <div class="batik-divider"></div>

            <h5>Total: Rp {{ number_format($total) }}</h5>

            <div class="batik-divider"></div>

            <h4 class="text-danger">Metode Pembayaran</h4>

            <select name="payment_method" class="form-select mb-3">
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