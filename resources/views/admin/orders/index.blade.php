@extends('admin.layouts.app')
@section('content')
    <h1 class="mb-4">Manajemen Pesanan</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
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
                                    {{-- LINK INI YANG DIPERBAIKI --}}
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
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
            <div class="mt-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection