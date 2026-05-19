@extends('layouts.main')

@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Reset Password</h1>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 50px; margin-bottom: 1rem;">
                                <h3 class="card-title mb-1">Atur Password Baru Anda</h3>
                            </div>

                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" value="{{ old('email', $request->email) }}" required autofocus>
                                    <label for="email">Alamat Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" type="password" name="password" placeholder="Password Baru" required>
                                    <label for="password">Password Baru</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection