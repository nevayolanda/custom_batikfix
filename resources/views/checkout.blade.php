@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="container">

    <div class="card p-4">

        <h3 class="mb-4 text-danger">Checkout</h3>

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

        <h4 class="mb-3">Total Bayar: 
            <span class="text-danger">
                Rp {{ number_format($grandTotal, 0, ',', '.') }}
            </span>
        </h4>

        <!-- BUTTON KE HALAMAN DETAIL -->
        @if(request('product_id'))
            <!-- dari tombol PESAN SEKARANG -->
            <a href="/checkout/detail?product_id={{ request('product_id') }}&qty={{ request('qty') }}" 
               class="btn btn-danger w-100">
               Bayar Sekarang
            </a>
        @else
            <!-- dari CART -->
            <a href="/checkout/detail" class="btn btn-danger w-100">
                Bayar Sekarang
            </a>
        @endif

    </div>

</div>

@endsection