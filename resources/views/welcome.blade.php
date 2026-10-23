@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="position-relative py-5 text-white" style="background: linear-gradient(135deg, #1c3b2b 0%, #2e7d32 100%); min-height: 400px;">
    <div class="position-absolute w-100 h-100" style="background-image: url('https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?w=1200&auto=format&fit=crop&q=80'); background-size: cover; background-position: center; opacity: 0.2;"></div>
    
    <div class="container position-relative">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6 py-5">
                <h1 class="display-4 fw-bold mb-3">
                    Selamat Datang di <span style="color: #d97706;">CaffePonics</span>
                </h1>
                <p class="fs-5 mb-4 text-light">
                    Produk pertanian perkotaan yang sehat, segar, dan tanpa pestisida. Nikmati kualitas terbaik langsung dari petani hidroponik kami.
                </p>
                <div class="d-flex gap-3">
                    <a href="/products" class="btn btn-success btn-lg fw-bold">
                        <i class="fa-solid fa-shopping-bag me-2"></i>Lihat Katalog
                    </a>
                    <a href="#Featured" class="btn btn-outline-light btn-lg fw-bold">
                        <i class="fa-solid fa-arrow-down me-2"></i>Jelajahi
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://images.unsplash.com/photo-1464226184485-280280df43cc?w=500&auto=format&fit=crop&q=80" alt="Produk Segar" class="img-fluid rounded-3xl shadow-lg" style="max-width: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section id="Featured" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h2 fw-bold text-success mb-3">
                <i class="fa-solid fa-star me-2"></i>Produk Unggulan
            </h2>
            <p class="text-muted fs-5">Pilihan terbaik dari koleksi produk kami</p>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @php
                $featured = \App\Models\Product::limit(4)->get();
            @endphp
            
            @foreach($featured as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 produk_tgs2">
                        <img 
                            class="card-img-top gambar_tgs2" 
                            src="/asset/picture/Tgs2/{{ $product->gambar }}" 
                            alt="{{ $product->nama }}"
                            onerror="this.src='https://via.placeholder.com/200?text={{ $product->nama }}'"
                        />
                        <div class="card-body d-flex flex-column justify-content-between p-3">
                            <h5 class="card-title fw-bold nama_tgs2 m-0">{{ $product->nama }}</h5>
                            <div class="info_tgs2">
                                <div>
                                    <div class="harga_tgs2">Rp{{ number_format($product->harga, 0, ',', '.') }} | {{ $product->satuan }}</div>
                                    <div class="kategori_tgs2">{{ $product->jumlah }} pcs</div>
                                </div>
                                <button class="buy_tgs2" onclick="window.location.href='/products'">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="/products" class="btn btn-success btn-lg fw-bold">
                <i class="fa-solid fa-arrow-right me-2"></i>Lihat Semua Produk
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center">
                    <div class="mb-3">
                        <i class="fa-solid fa-leaf fa-3x text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-2">100% Organik</h5>
                    <p class="text-muted">Produk tanpa pestisida kimia, ditanam dengan sistem hidroponik modern</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <div class="mb-3">
                        <i class="fa-solid fa-truck fa-3x text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pengiriman Cepat</h5>
                    <p class="text-muted">Dipetik saat dipesan untuk menjamin kesegaran maksimal</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <div class="mb-3">
                        <i class="fa-solid fa-check-circle fa-3x text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Terjamin Kualitas</h5>
                    <p class="text-muted">Nutrisi air terkontrol dan standar kualitas internasional</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="Contact" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <h3 class="fw-bold text-success mb-4">Hubungi Kami</h3>
                <div class="mb-3">
                    <h6 class="fw-bold">WhatsApp</h6>
                    <p class="text-muted"><i class="fa-brands fa-whatsapp text-success me-2"></i>0887433130505</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Email</h6>
                    <p class="text-muted"><i class="fa-solid fa-envelope text-success me-2"></i>alifkusuma098@gmail.com</p>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Alamat</h6>
                    <p class="text-muted"><i class="fa-solid fa-location-dot text-success me-2"></i>Pancoran Mas, Depok, Indonesia</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h6 class="fw-bold mb-3">Jam Operasional</h6>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2"><strong>Senin - Jumat:</strong> 08:00 - 17:00</li>
                        <li class="mb-2"><strong>Sabtu:</strong> 09:00 - 15:00</li>
                        <li><strong>Minggu:</strong> Tutup</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
