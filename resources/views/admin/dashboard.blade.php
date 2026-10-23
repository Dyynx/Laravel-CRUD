@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h2 class="h3 fw-bold text-success mb-1">
                <i class="fa-solid fa-lock me-2"></i>Admin Dashboard
            </h2>
            <p class="text-muted small mb-0">Kelola produk katalog CaffePonics</p>
        </div>
        <a href="/admin/products/create" class="btn btn-success">
            <i class="fa-solid fa-plus me-2"></i>Tambah Produk
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded shadow-sm p-4 border">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $product->nama }}</strong></td>
                            <td>Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td>{{ $product->satuan }}</td>
                            <td>
                                <span class="badge bg-info">{{ $product->jumlah }}</span>
                            </td>
                            <td>
                                <img src="/asset/picture/Tgs2/{{ $product->gambar }}" alt="{{ $product->nama }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                            </td>
                            <td>
                                <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <form method="POST" action="/admin/products/{{ $product->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">
                                        <i class="fa-solid fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="fa-solid fa-inbox fa-2x mb-2 d-block"></i>
                                Tidak ada produk
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
