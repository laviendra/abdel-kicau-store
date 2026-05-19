@extends('layouts.main')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Pesanan</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/shop">Koleksi</a></li>
            <li class="breadcrumb-item active text-white">Pesanan</li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Detail Pesanan</h1>
            <form action="{{ route('order.place') }}" method="POST">
                @csrf
                <div class="row g-5">
                    <div class="col-md-12 col-lg-5 col-xl-5">
                        <h4 class="mb-4">Detail Penagihan</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Nama Depan<sup>*</sup></label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Nama Belakang<sup>*</sup></label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Alamat Lengkap<sup>*</sup></label>
                            <input type="text" class="form-control" name="address" placeholder="Nomor Rumah dan Nama Jalan" required>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Kota<sup>*</sup></label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Kode Pos<sup>*</sup></label>
                            <input type="text" class="form-control" name="post_code" required>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">No. HP<sup>*</sup></label>
                            <input type="tel" class="form-control" name="phone" required>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email<sup>*</sup></label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <hr>
                        <div class="form-item">
                            <label class="form-label my-3">Metode Pembayaran<sup>*</sup></label>
                            <select class="form-select" name="payment_method" required>
                                <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                <option value="bank_transfer">Transfer Bank</option>
                                <option value="cod">COD (Cash On Delivery)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-7 col-xl-7">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col" style="width: 150px;">Jumlah</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalPrice = 0; @endphp
                                    @forelse($cartItems as $item)
                                        @php 
                                            $subTotal = $item->bird->price * $item->quantity;
                                            $totalPrice += $subTotal;
                                        @endphp
                                        <tr class="align-middle">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('img/birds/' . $item->bird->image) }}" class="img-fluid me-3 rounded" style="width: 80px; height: 80px; object-fit: cover;" alt="">
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">{{ $item->bird->name }}</span>
                                                        <a href="{{ route('cart.remove', ['id' => $item->id]) }}" class="text-danger small" onclick="return confirm('Yakin ingin menghapus item ini?')">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="white-space: nowrap;">Rp {{ number_format($item->bird->price) }}</td>
                                            <td>
                                                <input type="number" 
                                                       class="form-control form-control-sm text-center quantity-input" 
                                                       value="{{ $item->quantity }}" 
                                                       min="1" 
                                                       data-id="{{ $item->id }}"
                                                       style="width: 70px;">
                                            </td>
                                            <td style="white-space: nowrap;" id="subtotal-{{ $item->id }}">Rp {{ number_format($subTotal) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-5">
                                                Keranjang Anda Kosong
                                            </td>
                                        </tr>
                                    @endforelse

                                    @if($cartItems->isNotEmpty())
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold py-3">Subtotal</td>
                                        <td class="py-3" style="white-space: nowrap;" id="subtotal-row">Rp {{ number_format($totalPrice) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold py-3">Total</td>
                                        <td class="py-3 fw-bold" style="white-space: nowrap;" id="grand-total-row">Rp {{ number_format($totalPrice) }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Buat Pesanan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection