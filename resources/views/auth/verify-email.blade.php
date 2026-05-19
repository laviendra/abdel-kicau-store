@extends('layouts.main')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <h3 class="card-title mb-1">Verifikasi Email Anda</h3>
                                <p class="text-muted">Terima kasih telah mendaftar! Sebelum memulai, bisakah Anda memverifikasi alamat email Anda dengan mengklik link yang baru saja kami kirimkan? Jika Anda tidak menerima email, kami akan dengan senang hati mengirimkan yang lain.</p>
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-success mb-4" role="alert">
                                    Link verifikasi baru telah dikirim ke alamat email Anda.
                                </div>
                            @endif

                            <div class="mt-4 d-flex flex-column gap-3">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            Kirim Ulang Email Verifikasi
                                        </button>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-link">
                                            Logout
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection