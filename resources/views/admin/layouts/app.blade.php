<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Abdel Kicau Mania</title>
    
    {{-- Library & Font --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>

    {{-- CSS Kustom untuk Tema Admin --}}
    <style>
        .admin-sidebar {
            background-color: #f8f9fa; /* Latar abu-abu terang */
            border-right: 1px solid #dee2e6;
        }
        .admin-sidebar .nav-link {
            color: #333;
            border-radius: 0.3rem;
        }
        .admin-sidebar .nav-link.active {
            background-color: #81C408; /* Warna hijau primary Anda */
            color: white;
        }
        .admin-sidebar .nav-link:not(.active):hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar (Menu Samping) --}}
        <div class="admin-sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 280px; min-height: 100vh;">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                {{-- Logo dan Nama Toko --}}
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 32px; margin-right: 10px;">
                <span class="fs-4 text-dark">Admin Panel</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item mb-2">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt fa-fw me-2"></i>Dashboard
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
            <i class="fas fa-box fa-fw me-2"></i>Manajemen Produk
        </a>
    </li>
    </ul>
            <hr>
            <a href="/" class="btn btn-outline-secondary" target="_blank">Lihat Website</a>
        </div>
        
        {{-- Konten Utama Halaman --}}
        <main class="w-100 p-4" style="background-color: #ffffff;">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>