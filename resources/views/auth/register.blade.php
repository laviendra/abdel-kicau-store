@extends('layouts.main')

@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Registrasi</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active text-white">Registrasi</li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4 p-md-5">
                            
                            <div class="text-center mb-4">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 50px; margin-bottom: 1rem;">
                                <h3 class="card-title mb-1">Buat Akun Baru</h3>
                                <p class="text-muted">Gratis dan hanya butuh beberapa detik.</p>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>
                                    <label for="name">Nama Lengkap</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                    <label for="email">Alamat Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                                    <label for="password">Password</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small">
                                Sudah punya akun? <a href="{{ route('login') }}">Login di sini!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection