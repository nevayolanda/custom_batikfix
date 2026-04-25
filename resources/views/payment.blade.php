@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="container">

    <div class="card p-4">

        <h3 class="text-danger mb-3">Pembayaran Order</h3>

        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>

        <hr>

        <h5>Produk:</h5>

        @foreach($order->items as $item)
            <div class="d-flex justify-content-between">
                <span>{{ $item->product->nama_batik }} ({{ $item->quantity }})</span>
                <span>
                    Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                </span>
            </div>
        @endforeach

        <hr>

        <h4>
            Total:
            <span class="text-danger">
                Rp {{ number_format($order->total_price, 0, ',', '.') }}
            </span>
        </h4>

        <hr>

        <!-- BUTTON BAYAR -->
        <button id="pay-button" class="btn btn-success w-100">
            Bayar Sekarang
        </button>

        <a href="/orders" class="btn btn-outline-danger w-100 mt-2">
            Kembali ke Pesanan
        </a>

    </div>

</div>

<!-- MIDTRANS SNAP -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
document.getElementById('pay-button').onclick = function () {
    snap.pay("{{ $snapToken }}", {
        onSuccess: function(result){
            window.location.href = "/orders";
        },
        onPending: function(result){
            window.location.href = "/orders";
        },
        onError: function(result){
            alert("Pembayaran gagal");
        },
        onClose: function(){
            alert("Kamu menutup pembayaran");
        }
    });
};
</script>

@endsection