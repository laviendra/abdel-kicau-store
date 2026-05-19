@extends('layouts.main')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Riwayat Pesanan</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active text-white">Riwayat Pesanan</li>
        </ol>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @forelse ($orders as $order)
                <div class="card shadow-sm mb-4">
                    {{-- Card Header (tidak berubah) --}}
                    <div class="card-header bg-light p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">Pesanan #{{ $order->id }}</h5>
                                <small class="text-muted">Tanggal: {{ $order->created_at->format('d M Y') }}</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('invoice.show', $order->id) }}" class="btn btn-sm btn-outline-secondary me-2" target="_blank">Lihat Invoice</a>
                                @php
                                    $statusClass = 'bg-warning text-dark';
                                    if ($order->status == 'selesai') $statusClass = 'bg-success';
                                    if ($order->status == 'dibatalkan') $statusClass = 'bg-danger';
                                    if ($order->status == 'menunggu konfirmasi') $statusClass = 'bg-info text-dark';
                                    if ($order->status == 'dikirim') $statusClass = 'bg-primary';
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ str_replace('_', ' ', ucfirst($order->status)) }}</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Card Body (tidak berubah) --}}
                    <div class="card-body p-4">
                        <div class="row mb-4">
                            <div class="col-md-6"><h6>Dikirim ke:</h6><p class="mb-1"><strong>{{ $order->name }}</strong><br>{{ $order->address }}<br>{{ $order->city }}, {{ $order->post_code }}<br>Email: {{ $order->email }}<br>Telepon: {{ $order->phone }}</p></div>
                            <div class="col-md-6"><h6>Metode Pembayaran:</h6><p>@if($order->payment_method == 'bank_transfer') Transfer Bank @elseif($order->payment_method == 'cod') COD (Bayar di Tempat) @else {{ $order->payment_method }} @endif</p></div>
                        </div>
                        <h6 class="mb-3">Item yang Dipesan:</h6>
                        <div class="table-responsive"><table class="table table-borderless table-sm"><tbody>
                            @foreach ($order->items as $item)
                                <tr class="align-middle">
                                    <td style="width: 80px;"><img src="{{ asset('img/birds/' . $item->bird->image) }}" class="img-fluid rounded" alt=""></td>
                                    <td>{{ $item->bird->name }}</td>
                                    <td>{{ $item->quantity }} x Rp {{ number_format($item->price) }}</td>
                                    <td class="text-end">Rp {{ number_format($item->quantity * $item->price) }}</td>
                                </tr>
                            @endforeach
                        </tbody></table></div>
                        <hr>
                        @if ($order->payment_method == 'bank_transfer')
                            @if ($order->status == 'pending')
                                <a href="{{ route('payment.confirmation.show', $order->id) }}" class="btn btn-primary btn-sm">Konfirmasi Pembayaran</a>
                            @elseif($order->payment_proof)
                                <div><p class="mb-1 fw-bold small">Bukti Transfer:</p><a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank"><img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Transfer" style="max-height: 80px;" class="img-thumbnail"></a></div>
                            @endif
                        @endif
                    </div>

                    <div class="card-footer d-flex justify-content-between align-items-center bg-light">
                        <div>
                            {{-- Blok @if ditambahkan di sini --}}
                            @if ($order->status == 'dikirim')
                                <form action="{{ route('order.receive', $order->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin pesanan ini sudah sampai?')">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Pesanan Sudah Sampai</button>
                                </form>
                            @endif {{-- Pastikan @endif ini ada --}}
                        </div>
                        <strong>Total Pesanan: Rp {{ number_format($order->total_price) }}</strong>
                        {{-- Letakkan kode ini di bawah tampilan Metode Pembayaran --}}

                            <a href="https://wa.me/6289681936591?text=Halo, saya ingin bertanya tentang pesanan saya #{{ $order->id }}" class="btn btn-success mt-2" target="_blank">
                            <i class="fab fa-whatsapp"></i> Chat Penjual
                            </a>
                    </div>
                    </div>
            @empty
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                    <h4>Anda belum memiliki riwayat pesanan.</h4>
                    <p>Mari mulai berbelanja untuk melihat pesanan Anda di sini.</p>
                    <a href="{{ url('/shop') }}" class="btn btn-primary rounded-pill mt-3">Mulai Belanja</a>
                </div>
            @endforelse

            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection