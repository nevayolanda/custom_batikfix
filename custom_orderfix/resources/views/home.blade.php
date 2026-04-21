@extends('layouts.app')

@section('title', 'Dashboard - Custom Batik')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(135deg, #6B4423 0%, #4A2C1A 100%);
        color: #F5E6D3;
        padding: 60px 20px;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 50px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 10 Q40 20 30 30 Q20 20 30 10 M20 25 Q25 30 20 35 Q15 30 20 25 M40 25 Q45 30 40 35 Q35 30 40 25 M30 40 Q35 45 30 50 Q25 45 30 40' fill='none' stroke='%23D4AF37' stroke-width='1' opacity='0.15'/%3E%3C/svg%3E");
        opacity: 0.5;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-section h1 {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 15px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-section p {
        font-size: 18px;
        margin-bottom: 10px;
        opacity: 0.95;
    }

    .nav-card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .nav-card {
        background: linear-gradient(135deg, #FFFFFF 0%, #F5E6D3 100%);
        border: 2px solid #D4AF37;
        border-radius: 15px;
        padding: 40px 25px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }



    .nav-card .icon {
        font-size: 48px;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    .nav-card:hover .icon {
        transform: scale(1.15) rotate(5deg);
    }

    .nav-card h3 {
        color: #6B4423;
        font-weight: bold;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .nav-card p {
        color: #4A2C1A;
        font-size: 14px;
        opacity: 0.8;
        margin: 0;
    }

    .batik-accent {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
    }


    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .stats-section {
        background: linear-gradient(135deg, #8B6239 0%, #6B4423 100%);
        color: #F5E6D3;
        padding: 40px;
        border-radius: 15px;
        margin-top: 40px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        text-align: center;
    }

    .stat-item h4 {
        font-size: 32px;
        color: #D4AF37;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .stat-item p {
        font-size: 16px;
        opacity: 0.9;
    }

    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 32px;
        }

        .nav-card-container {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .hero-section {
            padding: 40px 20px;
        }
    }
</style>

<div class="hero-section">
    <div class="hero-content">
        <div class="batik-accent">
            <span class="batik-dot"></span>
            <span class="batik-dot"></span>
            <span class="batik-dot"></span>
        </div>
        <h1>Selamat Datang ke Custom Batik</h1>
        <p>Jelajahi Koleksi Batik Eksklusif dan Pesan Custom Batik Impian Anda</p>
        <p style="font-size: 16px; opacity: 0.85; margin-top: 15px;">
            Temukan desain batik tradisional dan ciptakan custom batik sesuai keinginan Anda
        </p>
    </div>
</div>

<!-- Updated to show only 2 cards: Koleksi Batik and Custom Batik -->
<div class="nav-card-container">
    <a href="{{ route('batik.koleksi') }}" class="nav-card">
        <h3>Koleksi Batik</h3>
        <p>Lihat koleksi desain batik tradisional kami yang indah dan eksklusif</p>
    </a>

    <a href="{{ route('custom_order.create') }}" class="nav-card">
        <h3>Pesan Custom Batik</h3>
        <p>Buat pesanan custom batik sesuai dengan keinginan dan desain Anda</p>
    </a>
</div>

<div class="stats-section">
    <div class="stat-item">
        <h4>Premium</h4>
        <p>Desain Berkualitas Tinggi</p>
    </div>
    <div class="stat-item">
        <h4>Custom</h4>
        <p>Sesuai Keinginan Anda</p>
    </div>
    <div class="stat-item">
        <h4>Tradisional</h4>
        <p>Batik Asli Indonesia</p>
    </div>
    <div class="stat-item">
        <h4>Terpercaya</h4>
        <p>Kualitas Terjamin</p>
    </div>
</div>

@endsection
