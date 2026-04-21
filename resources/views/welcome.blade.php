<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Batik - Sistem Manajemen Batik Berkualitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-brown: #6B4423;
            --dark-brown: #4A2C1A;
            --light-brown: #8B6239;
            --cream: #F5E6D3;
            --gold: #D4AF37;
            --text-dark: #2C1810;
        }

        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--cream) 0%, #E8D4C0 100%);
            color: var(--text-dark);
            scroll-behavior: smooth;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(135deg, var(--dark-brown) 0%, var(--primary-brown) 100%);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-bottom: 3px solid var(--gold);
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
            font-size: 26px;
            color: var(--gold) !important;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-custom .nav-link {
            color: var(--cream) !important;
            margin: 0 12px;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            color: var(--gold) !important;
            border-bottom: 2px solid var(--gold);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--dark-brown) 100%);
            color: var(--cream);
            padding: 100px 40px;
            border-radius: 20px;
            text-align: center;
            margin: 40px 0;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
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
            background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M40 15 Q55 30 40 45 Q25 30 40 15 M20 40 Q30 50 20 60 Q10 50 20 40 M60 40 Q70 50 60 60 Q50 50 60 40 M40 65 Q50 75 40 85 Q30 75 40 65' fill='none' stroke='%23D4AF37' stroke-width='1.5' opacity='0.2'/%3E%3C/svg%3E");
            animation: shift 20s linear infinite;
        }

        @keyframes shift {
            0% { transform: translate(0, 0); }
            100% { transform: translate(80px, 80px); }
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-section h1 {
            font-size: 56px;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
            line-height: 1.2;
        }

        .hero-section .subtitle {
            font-size: 20px;
            margin-bottom: 15px;
            opacity: 0.95;
        }

        .hero-section .description {
            font-size: 16px;
            margin-bottom: 30px;
            opacity: 0.88;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .batik-accent-dots {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .batik-dot {
            width: 10px;
            height: 10px;
            background: var(--gold);
            border-radius: 50%;
            animation: bounce 2s infinite;
        }

        .batik-dot:nth-child(2) {
            animation-delay: 0.3s;
        }

        .batik-dot:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        /* CTA Buttons */
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn-cta {
            padding: 14px 35px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border: none;
        }

        .btn-cta-primary {
            background-color: var(--gold);
            color: var(--dark-brown);
        }

        .btn-cta-primary:hover {
            background-color: #B8941F;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
        }

        .btn-cta-secondary {
            background-color: transparent;
            color: var(--gold);
            border: 2px solid var(--gold);
        }

        .btn-cta-secondary:hover {
            background-color: var(--gold);
            color: var(--dark-brown);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
        }

        /* Feature Cards */
        .features-section {
            margin: 60px 0;
        }

        .features-section h2 {
            text-align: center;
            color: var(--primary-brown);
            font-weight: bold;
            font-size: 42px;
            margin-bottom: 50px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05);
        }

        .feature-card {
            background: linear-gradient(135deg, #FFFFFF 0%, var(--cream) 100%);
            border: 2px solid var(--gold);
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .feature-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 15px 40px rgba(107, 68, 35, 0.25);
            border-color: var(--light-brown);
        }

        .feature-card .icon {
            font-size: 56px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .feature-card:hover .icon {
            transform: scale(1.2) rotate(5deg);
        }

        .feature-card h3 {
            color: var(--primary-brown);
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #555;
            font-size: 15px;
            line-height: 1.6;
            margin: 0;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--light-brown) 100%);
            color: var(--cream);
            padding: 50px;
            border-radius: 15px;
            margin: 60px 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-item h4 {
            font-size: 36px;
            color: var(--gold);
            font-weight: bold;
            margin-bottom: 10px;
        }

        .stat-item p {
            font-size: 15px;
            opacity: 0.92;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-brown) 0%, var(--primary-brown) 100%);
            color: var(--cream);
            text-align: center;
            padding: 40px 20px;
            margin-top: 60px;
            border-top: 3px solid var(--gold);
        }

        footer p {
            margin: 0;
            font-size: 15px;
        }

        footer .footer-links {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        footer a {
            color: var(--gold);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        footer a:hover {
            color: var(--cream);
            text-decoration: underline;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 25px;
            }

            .hero-section h1 {
                font-size: 36px;
            }

            .hero-section .subtitle {
                font-size: 16px;
            }

            .cta-buttons {
                flex-direction: column;
                gap: 12px;
            }

            .btn-cta {
                width: 100%;
            }

            .features-section h2 {
                font-size: 32px;
            }

            .feature-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Custom Batik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" style="background: var(--gold); color: var(--dark-brown); border-radius: 8px; padding: 8px 20px; margin-left: 10px;">Masuk Aplikasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container-lg">
        <div class="hero-section">
            <div class="hero-content">
                <div class="batik-accent-dots">
                    <span class="batik-dot"></span>
                    <span class="batik-dot"></span>
                    <span class="batik-dot"></span>
                </div>
                <h1>Selamat Datang ke Custom Batik</h1>
                <p class="subtitle">Sistem Manajemen Batik Premium & Terpercaya</p>
                <p class="description">
                    Kelola pelanggan, desain batik eksklusif, pesanan custom, dan pembayaran dengan mudah dalam satu platform yang elegan dan profesional.
                </p>
                <div class="cta-buttons">
                    <a href="{{ route('home') }}" class="btn-cta btn-cta-primary">Buka Aplikasi →</a>
                    <a href="#fitur" class="btn-cta btn-cta-secondary">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container-lg">
        <div class="features-section" id="fitur">
            <h2>Fitur Unggulan</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="icon">👥</div>
                        <h3>Manajemen Pelanggan</h3>
                        <p>Kelola data pelanggan dengan lengkap, terorganisir, dan mudah diakses kapan saja.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="icon">🎨</div>
                        <h3>Koleksi Batik</h3>
                        <p>Atur dan kelola seluruh koleksi desain batik eksklusif dengan sistem yang intuitif.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="icon">📦</div>
                        <h3>Pesanan Custom</h3>
                        <p>Pantau semua pesanan custom dari awal hingga selesai dengan tracking real-time.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="icon">💳</div>
                        <h3>Manajemen Pembayaran</h3>
                        <p>Kelola semua transaksi dan riwayat pembayaran dengan aman dan transparan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="container-lg">
        <div class="stats-section">
            <div class="stat-item">
                <h4>🏆</h4>
                <p>Premium Management</p>
            </div>
            <div class="stat-item">
                <h4>⚡</h4>
                <p>Fast & Responsive</p>
            </div>
            <div class="stat-item">
                <h4>🔒</h4>
                <p>Data Aman</p>
            </div>
            <div class="stat-item">
                <h4>🎭</h4>
                <p>Batik Tradisional</p>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="container-lg">
        <div id="tentang" style="margin: 60px 0; text-align: center;">
            <h2 style="color: var(--primary-brown); font-weight: bold; font-size: 42px; margin-bottom: 30px;">Tentang Custom Batik</h2>
            <div class="divider"></div>
            <p style="font-size: 16px; color: #555; line-height: 1.8; max-width: 700px; margin: 30px auto;">
                Custom Batik adalah solusi manajemen bisnis batik yang dirancang khusus untuk memenuhi kebutuhan industri batik modern. 
                Dengan antarmuka yang user-friendly dan fitur-fitur lengkap, kami membantu Anda mengelola bisnis batik dengan lebih efisien dan profesional.
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Custom Batik Management System. All rights reserved.</p>
        <p style="font-size: 14px; margin-top: 10px; opacity: 0.8;">Dibuat dengan Cinta untuk Batik Indonesia 🪡</p>
        <div class="footer-links">
            <a href="/">Beranda</a>
            <a href="#fitur">Fitur</a>
            <a href="#tentang">Tentang</a>
            <a href="{{ route('home') }}">Aplikasi</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
