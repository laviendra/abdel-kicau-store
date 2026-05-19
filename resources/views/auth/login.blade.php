@extends('layouts.main')

@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Login</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active text-white">Login</li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg border-0 rounded-lg">
                        {{-- CARD HEADER DIHAPUS, DIGANTI DENGAN KONTEN DI CARD BODY --}}
                        <div class="card-body p-4 p-md-5">
                            
                            <div class="text-center mb-4">
                                {{-- 1. LOGO DITAMBAHKAN DI SINI --}}
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 50px; margin-bottom: 1rem;">
                                
                                {{-- 2. JUDUL DENGAN GAYA BARU --}}
                                <h3 class="card-title mb-1">Selamat Datang Kembali!</h3>
                                <p class="text-muted">Silakan login untuk melanjutkan.</p>
                            </div>
                            
                            @if (session('status'))
                                <div class="alert alert-success mb-4" role="alert">{{ session('status') }}</div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                                    <label for="email">Alamat Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                                    <label for="password">Password</label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" id="remember_me" type="checkbox" name="remember">
                                        <label class="form-check-label" for="remember_me">Ingat Saya</label>
                                    </div>
                                </div>

                                {{-- 3. TOMBOL LOGIN DIBUAT FULL-WIDTH --}}
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small">
                                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection