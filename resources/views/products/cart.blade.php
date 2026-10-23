@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h2 class="h3 fw-bold text-success mb-1">
                <i class="fa-solid fa-cart-shopping me-2"></i>Keranjang Belanja
            </h2>
        </div>
        <a href="/products" class="btn btn-outline-success rounded-pill btn-sm px-3">
            <i class="fa-solid fa-arrow-left me-1"></i> Lanjut Belanja
        </a>
    </div>

    <div class="bg-white rounded shadow-sm p-4 border">
        @if(count($cart) > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $product_id => $item)
                            <tr>
                                <td>
                                    <div class="d-flex gap-3 align-items-center">
                                        <img src="/asset/picture/Tgs2/{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                        <strong>{{ $item['nama'] }}</strong>
                                    </div>
                                </td>
                                <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td class="fw-bold text-success">Rp{{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</td>
                                <td>
                                    <a href="/cart/remove/{{ $product_id }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">
                                        <i class="fa-solid fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-end mt-4">
                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <h5 class="card-title">Ringkasan</h5>
                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Total Item:</span>
                                <strong>{{ count($cart) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Total Harga:</span>
                                <strong class="text-success fs-5">Rp{{ number_format($total, 0, ',', '.') }}</strong>
                            </div>
                            <button class="btn btn-success w-100" disabled>
                                <i class="fa-solid fa-credit-card me-2"></i>Checkout (Fitur Segera Hadir)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center py-5">
                <i class="fa-solid fa-inbox fa-3x mb-3 d-block"></i>
                <h5>Keranjang Anda Kosong</h5>
                <p class="text-muted mb-3">Mulai belanja sekarang!</p>
                <a href="/products" class="btn btn-success">
                    <i class="fa-solid fa-shopping-bag me-2"></i>Lihat Produk
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
