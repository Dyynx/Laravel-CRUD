@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h2 class="h3 fw-bold text-success mb-1">
                <i class="fa-solid fa-plus me-2"></i>Tambah Produk Baru
            </h2>
        </div>
        <a href="/admin/dashboard" class="btn btn-outline-secondary rounded-pill btn-sm px-3">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-white rounded shadow-sm p-4 border">
                <form method="POST" action="/admin/products">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama Produk <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control @error('nama') is-invalid @enderror" 
                            id="nama" 
                            name="nama" 
                            value="{{ old('nama') }}"
                            required
                        >
                        @error('nama')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="harga" class="form-label fw-bold">Harga (Rp) <span class="text-danger">*</span></label>
                            <input 
                                type="number" 
                                class="form-control @error('harga') is-invalid @enderror" 
                                id="harga" 
                                name="harga" 
                                value="{{ old('harga') }}"
                                min="0"
                                step="1000"
                                required
                            >
                            @error('harga')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="satuan" class="form-label fw-bold">Satuan <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                class="form-control @error('satuan') is-invalid @enderror" 
                                id="satuan" 
                                name="satuan" 
                                value="{{ old('satuan', '1kg') }}"
                                required
                            >
                            @error('satuan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label fw-bold">Jumlah (pcs) <span class="text-danger">*</span></label>
                        <input 
                            type="number" 
                            class="form-control @error('jumlah') is-invalid @enderror" 
                            id="jumlah" 
                            name="jumlah" 
                            value="{{ old('jumlah') }}"
                            min="1"
                            required
                        >
                        @error('jumlah')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-bold">Nama File Gambar <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control @error('gambar') is-invalid @enderror" 
                            id="gambar" 
                            name="gambar" 
                            value="{{ old('gambar') }}"
                            placeholder="contoh: kangkung-1024x724.png"
                            required
                        >
                        <small class="text-muted d-block mt-2">File gambar harus berada di folder <code>/asset/picture/Tgs2/</code></small>
                        @error('gambar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success fw-bold flex-grow-1">
                            <i class="fa-solid fa-save me-2"></i>Simpan Produk
                        </button>
                        <a href="/admin/dashboard" class="btn btn-secondary fw-bold">
                            <i class="fa-solid fa-times me-2"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
