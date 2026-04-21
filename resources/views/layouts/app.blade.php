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

        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--cream) 0%, #E8D4C0 100%);
            color: var(--text-dark);
        }

        /* Batik Pattern Background */
        .batik-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 10 Q40 20 30 30 Q20 20 30 10 M20 25 Q25 30 20 35 Q15 30 20 25 M40 25 Q45 30 40 35 Q35 30 40 25 M30 40 Q35 45 30 50 Q25 45 30 40' fill='none' stroke='%238B6239' stroke-width='1' opacity='0.3'/%3E%3C/svg%3E");
            background-size: 60px 60px;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(135deg, var(--dark-brown) 0%, var(--primary-brown) 100%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            border-bottom: 3px solid var(--gold);
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
            font-size: 24px;
            color: var(--gold) !important;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .navbar-custom .nav-link {
            color: var(--cream) !important;
            margin: 0 10px;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
        }

        .navbar-custom .nav-link:hover {
            color: var(--gold) !important;
            border-bottom: 2px solid var(--gold);
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(180deg, var(--dark-brown) 0%, var(--primary-brown) 100%);
            min-height: 100vh;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: var(--cream) !important;
            padding: 15px 20px;
            margin: 5px 0;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background: rgba(212, 175, 55, 0.1);
            border-left: 4px solid var(--gold);
            color: var(--gold) !important;
        }

        .sidebar .nav-link.active {
            background: rgba(212, 175, 55, 0.2);
            border-left: 4px solid var(--gold);
            color: var(--gold) !important;
            font-weight: bold;
        }

        /* Card */
        .card {
            border: none;
            border-left: 5px solid var(--gold);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.95);
            margin-bottom: 20px;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--light-brown) 100%);
            color: var(--cream);
            border: none;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-brown);
            border-color: var(--primary-brown);
        }

        .btn-primary:hover {
            background-color: var(--dark-brown);
            border-color: var(--dark-brown);
            box-shadow: 0 4px 8px rgba(107, 68, 35, 0.3);
        }

        .btn-success {
            background-color: #7CB342;
            border-color: #7CB342;
        }

        .btn-success:hover {
            background-color: #689F38;
            border-color: #689F38;
        }

        .btn-danger {
            background-color: #E53935;
            border-color: #E53935;
        }

        .btn-danger:hover {
            background-color: #C62828;
            border-color: #C62828;
        }

        .btn-warning {
            background-color: var(--gold);
            border-color: var(--gold);
            color: var(--dark-brown) !important;
        }

        .btn-warning:hover {
            background-color: #B8941F;
            border-color: #B8941F;
        }

        /* Table */
        .table {
            background: white;
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--light-brown) 100%);
            color: var(--cream);
        }

        .table tbody tr {
            border-bottom: 1px solid #E8D4C0;
        }

        .table tbody tr:hover {
            background: rgba(212, 175, 55, 0.05);
        }

        /* Badge */
        .badge-pending {
            background-color: #FFA726;
            color: white;
        }

        .badge-proses {
            background-color: #42A5F5;
            color: white;
        }

        .badge-selesai {
            background-color: #66BB6A;
            color: white;
        }

        .badge-dibayar {
            background-color: var(--gold);
            color: var(--dark-brown);
        }

        /* Alert */
        .alert {
            border: none;
            border-left: 4px solid var(--gold);
        }

        .alert-success {
            background: rgba(123, 195, 66, 0.1);
            color: #558B2F;
        }

        /* Form */
        .form-control, .form-select {
            border: 1px solid #D4AF37;
            border-radius: 8px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-brown);
            box-shadow: 0 0 0 0.2rem rgba(107, 68, 35, 0.25);
        }

        .form-label {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 8px;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-brown) 0%, var(--primary-brown) 100%);
            color: var(--cream);
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            border-top: 3px solid var(--gold);
        }

        /* Container */
        .container-fluid {
            padding: 20px;
        }

        /* Header Section */
        .page-header {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--light-brown) 100%);
            color: var(--cream);
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .page-header h1 {
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* Batik decorative elements */
        .batik-divider {
            height: 3px;
            background: linear-gradient(90deg, var(--primary-brown), var(--gold), var(--primary-brown));
            margin: 20px 0;
            border-radius: 2px;
        }

        /* Image styling */
        .batik-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            border: 3px solid var(--gold);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="batik-pattern">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Custom Batik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Updated navbar for customer-focused navigation -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('batik.koleksi') }}">Koleksi Batik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('custom_order.create') }}">Pesan Custom</a>
                    </li>
                    @if(session('pelanggan_id'))
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pesanan Saya</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer;">Logout</button>
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

    <!-- Main Content -->
    <div class="container-fluid">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Custom Batik. All rights reserved. Dibuat dengan Cinta untuk Batik Indonesia.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
