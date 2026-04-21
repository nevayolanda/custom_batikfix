@extends('layouts.app')

@section('title', 'Login - Custom Batik')

@section('content')
<style>
    .auth-container {
        max-width: 450px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .auth-card {
        background: white;
        border: 2px solid #D4AF37;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-header h2 {
        color: #6B4423;
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 28px;
    }

    .auth-header p {
        color: #8B6239;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        color: #6B4423;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        border: 1px solid #D4AF37;
        border-radius: 8px;
        padding: 12px;
        font-size: 14px;
    }

    .form-control:focus {
        border-color: #6B4423;
        box-shadow: 0 0 0 0.2rem rgba(107, 68, 35, 0.25);
    }

    .btn-login {
        width: 100%;
        background: linear-gradient(135deg, #6B4423 0%, #4A2C1A 100%);
        color: #F5E6D3;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(107, 68, 35, 0.3);
    }

    .auth-footer {
        text-align: center;
        margin-top: 20px;
        color: #8B6239;
        font-size: 14px;
    }

    .auth-footer a {
        color: #6B4423;
        text-decoration: none;
        font-weight: bold;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    .error-message {
        background: rgba(229, 57, 53, 0.1);
        color: #C62828;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 4px solid #C62828;
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h2>Masuk Akun</h2>
            <p>Akses dashboard pelanggan Anda</p>
        </div>

        @if ($errors->any())
            <div class="error-message">
                <strong>Login Gagal!</strong>
                <ul style="margin-bottom: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>

        <div class="auth-footer">
            Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </div>
    </div>
</div>

@endsection
