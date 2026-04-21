@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<div class="page-header">
    <h1>Tambah Pelanggan Baru</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Form Tambah Pelanggan</div>
            <div class="card-body">
                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pelanggan *</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}">
                        @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                        @error('alamat')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                        @error('no_hp')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="batik-divider"></div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
