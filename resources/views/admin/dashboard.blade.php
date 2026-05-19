@extends('admin.layouts.app')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    {{-- Kartu Statistik --}}
    <div class="row justify-content-center">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Pendapatan</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>Rp {{ number_format($totalRevenue) }}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Total Pesanan Terjual</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $totalSoldOrders }}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-box-open fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Total Produk</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $totalProducts }}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-feather-alt fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Pesanan Terbaru --}}
    <div class="card shadow-sm mt-4">
        <div class="card-header">
            <h5 class="m-0">Pesanan Terbaru</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentOrders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>Rp {{ number_format($order->total_price) }}</td>
                                <td>
                                    @php
                                        $statusClass = 'bg-warning text-dark';
                                        if ($order->status == 'selesai') $statusClass = 'bg-success';
                                        if ($order->status == 'dibatalkan') $statusClass = 'bg-danger';
                                        if ($order->status == 'menunggu konfirmasi') $statusClass = 'bg-info text-dark';
                                    @endphp
                                    <span class="badge {{ $statusClass }}">{{ str_replace('_', ' ', ucfirst($order->status)) }}</span>
                                </td>
                                <td>
                                    {{-- Nanti link ini akan menuju ke detail pesanan di admin --}}
                                    {{-- Ganti link ini --}}
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada pesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection