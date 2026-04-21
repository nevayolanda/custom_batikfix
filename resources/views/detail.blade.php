@extends('layouts.app')

@section('title', 'Detail Batik')

@section('content')

<div class="container">
    <div class="row">

        <!-- GAMBAR -->
        <div class="col-md-6">
            <img src="{{ asset($batik->gambar_batik) }}" class="img-fluid rounded">
        </div>

        <!-- DETAIL -->
        <div class="col-md-6">
            <h3>{{ $batik->nama_batik }}</h3>
            <p>Rp {{ number_format($batik->harga, 0, ',', '.') }}</p>

            <p>{{ $batik->deskripsi ?? 'Belum ada deskripsi.' }}</p>

            <!-- ERROR -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- FORM -->
            <form action="/cart/add/{{ $batik->id_batik }}" method="GET">

                <p class="text-muted">Min: 3 | Maks: 6</p>

                <!-- QTY -->
                <div class="d-flex align-items-center mb-3">
                    <button type="button" onclick="kurang()" class="btn btn-secondary">-</button>

                    <input type="number" id="qty" name="qty" value="3" 
                           min="3" max="6"
                           class="form-control text-center mx-2" 
                           style="width:80px;">

                    <button type="button" onclick="tambah()" class="btn btn-secondary">+</button>
                </div>

                <button type="submit" class="btn btn-primary">
                    Tambah ke Keranjang
                </button>

            </form>

        </div>

    </div>
</div>

<script>
function tambah() {
    let qty = document.getElementById('qty');
    if (parseInt(qty.value) < 6) {
        qty.value = parseInt(qty.value) + 1;
    }
}

function kurang() {
    let qty = document.getElementById('qty');
    if (parseInt(qty.value) > 3) {
        qty.value = parseInt(qty.value) - 1;
    }
}
</script>

@endsection