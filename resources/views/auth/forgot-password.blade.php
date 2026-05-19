@extends('layouts.main')

@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Lupa Password</h1>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 50px; margin-bottom: 1rem;">
                                <h3 class="card-title mb-1">Lupa Password Anda?</h3>
                                <p class="text-muted">Tidak masalah. Masukkan email Anda dan kami akan mengirimkan link untuk membuat password baru.</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                                    <label for="email">Alamat Email</label>
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Kirim Link Reset Password</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small">
                                <a href="{{ route('login') }}">Kembali ke Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection