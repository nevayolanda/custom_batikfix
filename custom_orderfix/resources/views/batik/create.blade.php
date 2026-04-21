@extends('layouts.app')

@section('title', 'Pesan Custom Batik - Custom Batik')

@section('content')
<style>
    .order-header {
        background: linear-gradient(135deg, #6B4423 0%, #4A2C1A 100%);
        color: #F5E6D3;
        padding: 40px 20px;
        border-radius: 10px;
        margin-bottom: 30px;
        text-align: center;
    }

    .order-header h1 {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .order-container {
        max-width: 700px;
        margin: 0 auto;
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border: 2px solid #D4AF37;
    }

    .form-section {
        margin-bottom: 30px;
    }

    .form-section h3 {
        color: #6B4423;
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #D4AF37;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        color: #6B4423;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-control, .form-select, textarea {
        width: 100%;
        border: 1px solid #D4AF37;
        border-radius: 6px;
        padding: 12px;
        font-size: 14px;
        font-family: inherit;
        box-sizing: border-box;
    }

    .form-control:focus, .form-select:focus, textarea:focus {
        outline: none;
        border-color: #6B4423;
        box-shadow: 0 0 0 3px rgba(107, 68, 35, 0.1);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #6B4423 0%, #4A2C1A 100%);
        color: #F5E6D3;
        border: none;
        padding: 14px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(107, 68, 35, 0.3);
    }

    .success-message {
        background: rgba(123, 195, 66, 0.1);
        border: 1px solid #7CB342;
        border-radius: 6px;
        padding: 20px;
        margin-bottom: 30px;
        color: #558B2F;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .order-container {
            padding: 20px;
        }
    }
</style>

<div class="order-header">
    <h1>Pesan Custom Batik</h1>
    <p>Wujudkan desain batik impian Anda bersama kami</p>
</div>

@if ($message = Session::get('success'))
    <div class="success-message">
        <strong>Berhasil!</strong> {{ $message }}
    </div>
@endif

<div class="order-container">
    <form action="{{ route('custom_order.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Informasi Pemesan -->
        <div class="form-section">
            <h3>Informasi Pemesan</h3>
            
            
            @if(session('pelanggan_id'))
                @php
                    $pelangganId = session('pelanggan_id');
                    $pelanggan = \App\Models\Pelanggan::find($pelangganId);
                @endphp
                
                @if($pelanggan)
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $pelanggan->nama }}" disabled>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $pelanggan->email }}" disabled>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" value="{{ $pelanggan->nomor_telepon }}" disabled>
                    </div>

                    <input type="hidden" name="id_pelanggan" value="{{ $pelanggan->id_pelanggan }}">
                @endif
            @else
                <div class="form-group">
                    <label class="form-label">Nama Lengkap *</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor Telepon *</label>
                    <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ old('nomor_telepon') }}" required>
                    @error('nomor_telepon')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat *</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat') }}</textarea>
                    @error('alamat')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            @endif
        </div>

        <!-- Detail Pesanan -->
        <div class="form-section">
            <h3>Detail Pesanan</h3>

            <div class="form-group">
                <label class="form-label">Jenis Kain *</label>
                <select name="jenis_kain" class="form-select @error('jenis_kain') is-invalid @enderror" required>
                    <option value="">-- Pilih Jenis Kain --</option>
                    <option value="Katun Premium" {{ old('jenis_kain') == 'Katun Premium' ? 'selected' : '' }}>Katun Premium</option>
                    <option value="Sutra" {{ old('jenis_kain') == 'Sutra' ? 'selected' : '' }}>Sutra</option>
                    <option value="Rayon" {{ old('jenis_kain') == 'Rayon' ? 'selected' : '' }}>Rayon</option>
                    <option value="Linen" {{ old('jenis_kain') == 'Linen' ? 'selected' : '' }}>Linen</option>
                </select>
                @error('jenis_kain')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Teknik Batik *</label>
                <select name="teknik" class="form-select @error('teknik') is-invalid @enderror" required>
                    <option value="">-- Pilih Teknik --</option>
                    <option value="Tulis" {{ old('teknik') == 'Tulis' ? 'selected' : '' }}>Batik Tulis</option>
                    <option value="Cap" {{ old('teknik') == 'Cap' ? 'selected' : '' }}>Batik Cap</option>
                    <option value="Kombinasi" {{ old('teknik') == 'Kombinasi' ? 'selected' : '' }}>Kombinasi Tulis & Cap</option>
                    <option value="Modern" {{ old('teknik') == 'Modern' ? 'selected' : '' }}>Batik Modern</option>
                </select>
                @error('teknik')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Deskripsi/Catatan Desain</label>
                <textarea name="teks_tambahan" class="form-control @error('teks_tambahan') is-invalid @enderror" rows="4" placeholder="Jelaskan desain yang Anda inginkan...">{{ old('teks_tambahan') }}</textarea>
                @error('teks_tambahan')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <button type="submit" class="btn-submit">Kirim Pesanan Custom</button>
    </form>
</div>

@endsection
