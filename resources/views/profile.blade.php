@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')

<div class="container">

    <div class="card p-4">

        <h3 class="text-danger mb-3">Profil Saya</h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/profile/update" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $pelanggan->nama }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $pelanggan->email }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ $pelanggan->nomor_telepon }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $pelanggan->alamat }}</textarea>
            </div>

            <button class="btn btn-danger w-100">
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>

@endsection