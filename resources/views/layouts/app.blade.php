<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - CaffePonics</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,600;1,500&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap 5.3 CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome 6 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Custom CSS -->
    <style>
        :root {
            --bg-dark-green: #1c3b2b;
            --primary-green: #2e7d32;
            --accent-amber: #d97706;
            --light-bg: #f8f9fa;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: "Poppins", sans-serif;
            color: #333333;
            background-color: #f4f6f4;
        }

        h1, h2, h3, .brand-title {
            font-family: "Lora", serif;
        }

        .bg-gradient-header {
            background: linear-gradient(135deg, #ffffff 0%, #eef7f2 100%);
        }

        .brand-logo-img {
            width: 55px;
            height: 55px;
            object-fit: cover;
        }

        .brand-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--bg-dark-green);
        }

        .text-accent {
            color: var(--primary-green);
        }

        .bg-dark-green {
            background-color: var(--bg-dark-green) !important;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.88);
            font-weight: 500;
            font-size: 0.95rem;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link.active {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.15);
        }

        .produk_tgs2 {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .produk_tgs2:hover {
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }

        .gambar_tgs2 {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 6px;
        }

        .nama_tgs2 {
            font-weight: 700;
            font-size: 1.1rem;
            margin: 10px 0 6px;
            color: #1b5e20;
        }

        .info_tgs2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .harga_tgs2 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #2e7d32;
        }

        .kategori_tgs2 {
            font-size: 0.8rem;
            color: #666;
            margin-top: 2px;
        }

        .buy_tgs2 {
            background-color: #2e7d32;
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .buy_tgs2:hover {
            background-color: #1b5e20;
        }

        .btn-amber {
            background-color: var(--accent-amber);
            color: #ffffff;
            border: none;
        }

        .btn-amber:hover {
            background-color: #b45309;
            color: #ffffff;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #d97706;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <!-- HEADER -->
    <header class="bg-gradient-header py-4 border-bottom shadow-sm text-center">
        <div class="container d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex align-items-center gap-3 mb-2">
                <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=150&auto=format&fit=crop&q=80" alt="Logo" class="brand-logo-img rounded-circle border border-2 border-success shadow-sm" />
                <h1 class="brand-title display-5 m-0">Caffe<span class="text-accent">Ponics</span></h1>
            </div>
            <p class="brand-subtitle text-muted fs-6 m-0">
                <i class="fa-solid fa-leaf text-success me-1"></i> Data Master Produk
            </p>
        </div>
    </header>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark-green shadow">
        <div class="container">
            <a class="navbar-brand d-lg-none fw-bold text-success fs-6" href="/">
                <i class="fa-solid fa-leaf me-1"></i> CaffePonics
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end bg-dark-green text-white" id="offcanvasNavbar">
                <div class="offcanvas-header border-bottom border-secondary">
                    <h5 class="offcanvas-title text-success fw-bold" id="offcanvasNavbarLabel">
                        <i class="fa-solid fa-leaf me-2"></i>CaffePonics
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-2 align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                <i class="fa-solid fa-house me-1"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="/products">
                                <i class="fa-solid fa-seedling me-1"></i> Products
                            </a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="/cart">
                                <i class="fa-solid fa-cart-shopping me-1"></i> Cart
                                @php
                                    $cartCount = count(session()->get('cart', []));
                                @endphp
                                @if($cartCount > 0)
                                    <span class="cart-badge">{{ $cartCount }}</span>
                                @endif
                            </a>
                        </li>
                        @if(session()->get('admin'))
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/dashboard">
                                    <i class="fa-solid fa-lock me-1"></i> Admin
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action="/admin/logout" method="POST" style="display: inline;">
                                    @csrf
                                    <button class="nav-link btn btn-link" type="submit" style="border: none; color: rgba(255, 255, 255, 0.88);">
                                        <i class="fa-solid fa-sign-out-alt me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/login">
                                    <i class="fa-solid fa-sign-in-alt me-1"></i> Admin Login
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ALERTS -->
    @if($message = session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($message = session('error'))
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold text-success mb-3">CaffePonics</h5>
                    <p class="small text-secondary">
                        Menyediakan produk pertanian perkotaan yang sehat, segar, dan tanpa pestisida.
                    </p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold mb-3">Navigasi</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="/" class="text-secondary text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="/products" class="text-secondary text-decoration-none">Products</a></li>
                        <li class="mb-2"><a href="/cart" class="text-secondary text-decoration-none">Cart</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold mb-3">Kualitas</h6>
                    <ul class="list-unstyled small text-secondary">
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>100% Bebas Pestisida</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Produk Segar</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold mb-3">Kontak</h6>
                    <p class="small text-secondary mb-1">
                        <i class="fa-brands fa-whatsapp me-2"></i>0887433130505
                    </p>
                    <p class="small text-secondary">
                        <i class="fa-solid fa-envelope me-2"></i>alifkusuma098@gmail.com
                    </p>
                </div>
            </div>
            <hr class="border-secondary my-4" />
            <div class="text-center small text-secondary">
                <p class="mb-0">&copy; 2026 CaffePonics. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
