@extends('layouts.main')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <h3 class="card-title mb-1">Area Aman</h3>
                                <p class="text-muted">Mohon konfirmasi password Anda sebelum melanjutkan.</p>
                            </div>

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Konfirmasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection