@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')

<h2 class="mb-4">Pesanan Saya</h2>

@if($orders->count() > 0)

    @foreach($orders as $order)
        <div class="card p-3 mb-3">
            
            <h5>Order #{{ $order->id }}</h5>

            <p>
                Total: Rp {{ $order->total_price }} <br>
                Metode: {{ $order->payment_method }} <br>

                Status:
                <b>
                    @if($order->status == 'dikemas')
                        📦 Dikemas
                    @elseif($order->status == 'dikirim')
                        🚚 Dikirim
                    @elseif($order->status == 'selesai')
                        ✅ Selesai
                    @else
                        {{ $order->status }}
                    @endif
                </b>
            </p>

            <!-- Tombol update status (opsional/admin) -->
            <div class="mt-2">
                <a href="/order/{{ $order->id }}/kirim" class="btn btn-warning btn-sm">Kirim</a>
                <a href="/order/{{ $order->id }}/selesai" class="btn btn-success btn-sm">Selesai</a>
            </div>

        </div>
    @endforeach

@else
    <div class="alert alert-info">
        Belum ada pesanan
    </div>
@endif

@endsection