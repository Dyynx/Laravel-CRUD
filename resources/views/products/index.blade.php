@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h2 class="h3 fw-bold text-success mb-1">
                <i class="fa-solid fa-table me-2"></i>Data Produk Lengkap CaffePonics
            </h2>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white rounded shadow-sm p-4 border mb-4">
        <form method="GET" action="/products" class="d-flex gap-2">
            <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ $search ?? '' }}" />
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-magnifying-glass me-2"></i>Cari
            </button>
            @if($search)
                <a href="/products" class="btn btn-outline-secondary">Reset</a>
            @endif
        </form>
    </div>

    <!-- Product Grid -->
    <div class="bg-white rounded shadow-sm p-4 border">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse($products as $product)
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
                                <button class="buy_tgs2" onclick="addToCart({{ $product->id }}, '{{ $product->nama }}', {{ $product->harga }})">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fa-solid fa-inbox me-2"></i>Produk tidak ditemukan
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Modal Add to Cart -->
<div class="modal fade" id="addToCartModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah ke Keranjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addToCartForm" method="POST" action="/cart/add">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="productId" name="product_id">
                    <div class="mb-3">
                        <label class="form-label">Produk</label>
                        <input type="text" id="productName" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="form-label">Jumlah</label>
                        <input type="number" id="qty" name="qty" class="form-control" value="1" min="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function addToCart(productId, productName, price) {
    document.getElementById('productId').value = productId;
    document.getElementById('productName').value = productName;
    document.getElementById('qty').value = 1;
    new bootstrap.Modal(document.getElementById('addToCartModal')).show();
}

document.getElementById('addToCartForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    fetch('/cart/add', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            bootstrap.Modal.getInstance(document.getElementById('addToCartModal')).hide();
            alert(data.message);
            location.reload();
        } else {
            alert(data.message);
        }
    });
});
</script>
@endsection
