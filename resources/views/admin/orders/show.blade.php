@extends('admin.layouts.app')
@section('content')
    <h1 class="mb-4">Detail Pesanan #{{ $order->id }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8">
            {{-- Detail Item & Pelanggan --}}
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Item Dipesan</h5>
                        
                        {{-- ======================= KESALAHAN 1 (PERBAIKAN) ======================= --}}
                        {{-- Nama route-nya 'admin.orders.invoice', bukan 'admin.invoice' --}}
                        <a href="{{ route('admin.orders.invoice', $order->id) }}" class="btn btn-sm btn-outline-secondary me-2" target="_blank">Lihat Invoice</a>
                    </div>
                    <table class="table">
                        @foreach($order->items as $item)
                        <tr>
                            <td><img src="{{ asset('img/birds/' . $item->bird->image) }}" width="50"></td>
                            <td>{{ $item->bird->name }}</td>
                            <td>{{ $item->quantity }} x Rp {{ number_format($item->price) }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <hr>
                    <h5 class="card-title mt-4">Detail Pelanggan</h5>
                    <p><strong>Nama:</strong> {{ $order->name }}</p>
                    <p><strong>Alamat:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->post_code }}</p>
                    <p><strong>Email:</strong> {{ $order->email }} | <strong>Telepon:</strong> {{ $order->phone }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            {{-- Aksi Admin --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Aksi Pesanan</h5>
                    <p><strong>Total:</strong> Rp {{ number_format($order->total_price) }}</p>
                    <p><strong>Metode Bayar:</strong> {{ $order->payment_method == 'cod' ? 'COD' : 'Transfer Bank' }}</p>
                    
                    @if($order->payment_proof)
                        <p><strong>Bukti Transfer:</strong></p>
                        <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank">
                            <img src="{{ asset('storage/' . $order->payment_proof) }}" class="img-thumbnail">
                        </a>
                    @endif

                    <hr>
                    <form action="{{ route('admin.orders.update.status', $order->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="status" class="form-label">Ubah Status Pesanan</label>
                            <select name="status" id="status" class="form-select">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="menunggu konfirmasi" {{ $order->status == 'menunggu konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="dibatalkan" {{ $order->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection