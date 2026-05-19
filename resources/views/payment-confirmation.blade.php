@extends('layouts.main')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Konfirmasi Pembayaran</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Riwayat Pesanan</a></li>
            <li class="breadcrumb-item active text-white">Konfirmasi</li>
        </ol>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5>Konfirmasi untuk Pesanan #{{ $order->id }}</h5>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="mb-3">1. Lakukan Pembayaran</h5>
                            <p>Silakan transfer sejumlah <strong>Rp {{ number_format($order->total_price) }}</strong> ke salah satu rekening berikut:</p>

                            <ul class="list-group mb-4">
                                <li class="list-group-item">
                                    <strong>BCA:</strong> 1234-567-890 a/n Abdel Kicau Mania
                                </li>
                                <li class="list-group-item">
                                    <strong>Mandiri:</strong> 098-765-4321 a/n Abdel Kicau Mania
                                </li>
                            </ul>

                            <h5 class="mb-3 mt-4">2. Upload Bukti Transfer</h5>
                            <p>Setelah melakukan pembayaran, mohon unggah bukti transfer Anda di bawah ini.</p>

                            <form action="{{ route('payment.confirmation.store', $order->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="payment_proof" class="form-label">File Bukti Transfer</label>
                                    <input class="form-control" type="file" id="payment_proof" name="payment_proof" required>
                                    @error('payment_proof')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2">Upload dan Konfirmasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection