@extends('layouts.app')

@section('content')

<h3>Keranjang</h3>

<table class="table">
    <tr>
        <th>Produk</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

    @php $grandTotal = 0; @endphp

    @foreach($items as $item)
    @php 
        $total = $item->quantity * $item->product->harga;
        $grandTotal += $total;
    @endphp

    <tr>
        <td>{{ $item->product->nama_batik }}</td>

        <!-- QTY -->
        <td>
            <div class="d-flex align-items-center">

                <!-- KURANG -->
                <form action="/cart/update/{{ $item->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="qty" value="{{ $item->quantity - 1 }}">
                    <button class="btn btn-sm btn-secondary">-</button>
                </form>

                <span class="mx-2">{{ $item->quantity }}</span>

                <!-- TAMBAH -->
                <form action="/cart/update/{{ $item->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="qty" value="{{ $item->quantity + 1 }}">
                    <button class="btn btn-sm btn-secondary">+</button>
                </form>

            </div>
        </td>

        <td>Rp {{ number_format($item->product->harga) }}</td>
        <td>Rp {{ number_format($total) }}</td>

        <!-- HAPUS -->
        <td>
            <a href="/cart/delete/{{ $item->id }}" class="btn btn-danger btn-sm">
                Hapus
            </a>
        </td>
    </tr>
    @endforeach
</table>

<h4>Total: Rp {{ number_format($grandTotal) }}</h4>

<a href="/checkout" class="btn btn-success">Checkout</a>

@endsection