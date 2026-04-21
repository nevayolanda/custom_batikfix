<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Custom Batik') - Manajemen Batik</title>
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

        body {
            background: linear-gradient(135deg, var(--cream) 0%, #E8D4C0 100%);
            color: var(--text-dark);
        }

        .navbar-custom {
            background: linear-gradient(135deg, var(--dark-brown) 0%, var(--primary-brown) 100%);
            border-bottom: 3px solid var(--gold);
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
            color: var(--gold) !important;
        }

        .navbar-custom .nav-link {
            color: var(--cream) !important;
        }

        .navbar-custom .nav-link:hover {
            color: var(--gold) !important;
        }

        footer {
            background: var(--dark-brown);
            color: var(--cream);
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Custom Batik</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('batik.koleksi') }}">Koleksi Batik</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('custom_order.create') }}">Pesan Custom</a>
                </li>

                <!-- 🛒 KERANJANG -->
                <li class="nav-item">
                    <a class="nav-link" href="/cart">Keranjang</a>
                </li>

                @if(session('pelanggan_id'))
                    <!-- 📦 PESANAN -->
                    <li class="nav-item">
                        <a class="nav-link" href="/orders">Pesanan Saya</a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="background:none;border:none;">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    @yield('content')

</div>

<!-- FOOTER -->
<footer>
    <p>&copy; 2025 Custom Batik</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>