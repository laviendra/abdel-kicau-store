@extends('layouts.main-invoice')
@section('content')
<div class="card invoice-card">
    <div class="card-header bg-white p-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 40px;">
                <h3 class="mt-2">Abdel Kicau Mania</h3>
            </div>
            <div class="text-end">
                <h2 class="mb-1">INVOICE</h2>
                <p class="mb-0">#{{ $order->id }}</p>
            </div>
        </div>
    </div>
    <div class="card-body p-4">
        <div class="row mb-4">
            <div class="col-md-6">
                <h5 class="mb-2">Ditagihkan Kepada:</h5>
                <p class="mb-1">
                    <strong>{{ $order->name }}</strong><br>
                    {{ $order->address }}<br>
                    {{ $order->city }}, {{ $order->post_code }}<br>
                    Email: {{ $order->email }}<br>
                    Telepon: {{ $order->phone }}
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <h5 class="mb-2">Detail Pesanan:</h5>
                <p class="mb-1"><strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d M Y') }}</p>
                <p class="mb-1"><strong>Status:</strong> <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span></p>
                @php
                    $method = $order->payment_method ?? optional($order->payment)->method ?? null;
                    $labelMap = [
                        'bank_transfer' => 'Transfer Bank',
                    ];
                    $paymentLabel = $method ? ($labelMap[$method] ?? ucwords(str_replace('_', ' ', $method))) : '-';
                @endphp
                <p class="mb-1"><strong>Metode Pembayaran:</strong> {{ $paymentLabel }}</p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>Deskripsi Produk</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-end">Harga Satuan</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->bird->name }}</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-end">Rp {{ number_format($item->price) }}</td>
                        <td class="text-end">Rp {{ number_format($item->quantity * $item->price) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th class="text-end fw-bold">Rp {{ number_format($order->total_price) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="text-center mt-4">
            <p class="text-muted">Terima kasih telah berbelanja di Abdel Kicau Mania!</p>
            <button class="btn btn-primary" onclick="window.print()">
                <i class="fas fa-print me-2"></i>Cetak Invoice
            </button>
        </div>
    </div>
</div>
@endsection