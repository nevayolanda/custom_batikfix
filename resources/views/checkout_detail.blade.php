@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="container">

    <div class="card p-4">

        <h3 class="mb-4 text-danger">Checkout</h3>

        <!-- 🔥 DATA PELANGGAN -->
        <div class="mb-4">
            <h5 class="text-danger">Data Pembeli</h5>

            <p><strong>Nama:</strong> {{ $pelanggan->nama }}</p>
            <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <p><strong>No HP:</strong> {{ $pelanggan->no_hp }}</p>

            <a href="/profile" class="btn btn-sm btn-warning">
                Edit Profil
            </a>
        </div>

        <div class="batik-divider"></div>

        <!-- 🔥 TABEL PRODUK -->
        <table class="table">
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>

            @php $grandTotal = 0; @endphp

            @foreach($items as $item)
            @php 
                $total = $item->quantity * $item->product->harga;
                $grandTotal += $total;
            @endphp

            <tr>
                <td>{{ $item->product->nama_batik }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->product->harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>

        <div class="batik-divider"></div>

        <!-- 🔥 TOTAL -->
        <h4 class="mb-3">
            Total Bayar: 
            <span class="text-danger">
                Rp {{ number_format($grandTotal, 0, ',', '.') }}
            </span>
        </h4>

        <!-- 🔥 BUTTON -->
        @if(request('product_id'))
            <!-- PESAN SEKARANG -->
            <a href="/checkout/detail?product_id={{ request('product_id') }}&qty={{ request('qty') }}" 
               class="btn btn-danger w-100">
               Bayar Sekarang
            </a>
        @else
            <!-- DARI CART -->
            <a href="/checkout/detail" class="btn btn-danger w-100">
                Bayar Sekarang
            </a>
        @endif

    </div>

</div>

@endsection