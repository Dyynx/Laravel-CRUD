@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <i class="fa-solid fa-lock fa-3x text-success mb-3 d-block"></i>
                <h4 class="fw-bold text-success">Login Admin</h4>
                <p class="text-muted small">Masukkan kredensial Anda</p>
            </div>

            <form method="POST" action="/admin/login">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input 
                        type="text" 
                        class="form-control @error('username') is-invalid @enderror" 
                        id="username" 
                        name="username" 
                        required
                        autofocus
                    >
                    @error('username')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="password" 
                        name="password" 
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold">
                    <i class="fa-solid fa-sign-in-alt me-2"></i>Login
                </button>
            </form>

            <hr class="my-4">

            <div class="alert alert-info small mb-0">
                <strong>Demo Credentials:</strong><br>
                Username: <code>admin</code><br>
                Password: <code>admin123</code>
            </div>
        </div>
    </div>
</div>
@endsection
