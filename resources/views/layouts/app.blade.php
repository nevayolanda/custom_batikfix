<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Custom Batik') - Manajemen Batik</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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

        <!-- TOGGLE MOBILE -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('batik.koleksi') }}">
                        <i class="bi bi-bag"></i> Koleksi Batik
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('custom_order.create') }}">
                        <i class="bi bi-pencil-square"></i> Custom
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/cart">
                        <i class="bi bi-cart"></i> Keranjang
                    </a>
                </li>

                @if(session('pelanggan_id'))

                    <!-- DROPDOWN PROFIL -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> 
                            {{ session('nama') ?? 'Akun' }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="/profile">
                                    <i class="bi bi-person"></i> Profil
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="/orders">
                                    <i class="bi bi-box"></i> Pesanan Saya
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="bi bi-person-plus"></i> Daftar
                        </a>
                    </li>

                @endif

            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">

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