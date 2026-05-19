@extends('layouts.main')
@section('content')
    {{-- Bagian Header dengan gambar latar dinamis dari satu burung --}}
    <div class="container-fluid page-header py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('img/birds/' . $bird->image) }}') center center / cover no-repeat;">
        <h1 class="text-center text-white display-6">Detail Burung</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/shop') }}">Koleksi</a></li>
            <li class="breadcrumb-item active text-white">Detail Burung</li>
        </ol>
    </div>

    {{-- Bagian Konten Utama --}}
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                {{-- KONTEN UTAMA (KIRI) --}}
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        {{-- GAMBAR PRODUK --}}
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <img src="{{ asset('img/birds/' . $bird->image) }}" class="img-fluid rounded" alt="{{ $bird->name }}">
                            </div>
                        </div>
                        {{-- DETAIL PRODUK UTAMA --}}
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">{{ $bird->name }}</h4>
                            <p class="mb-3">Kategori: {{ $bird->type }}</p>
                            <h5 class="fw-bold mb-3">Rp {{ number_format($bird->price, 0, ',', '.') }}</h5>
                            <div class="d-flex mb-4">
                                <i class="fa fa-star text-secondary"></i><i class="fa fa-star text-secondary"></i><i class="fa fa-star text-secondary"></i><i class="fa fa-star text-secondary"></i><i class="fa fa-star"></i>
                            </div>
                            <p class="mb-4">{{ $bird->description }}</p>

                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border"><i class="fa fa-minus"></i></button>
                                </div>
                                {{-- 2. INPUT DIBERI ID AGAR BISA DIBACA JAVASCRIPT --}}
                                <input type="text" id="quantity-input" class="form-control form-control-sm text-center border-0" value="1" min="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            
                            {{-- 3. TOMBOL "TAMBAH" DIPERBAIKI --}}
                            <a href="{{ route('cart.add', ['id' => $bird->id]) }}" class="btn border-0 rounded-pill px-4 py-2 mb-4 text-white add-to-cart-btn" style="background-color: #a4d65e;">
                                <i class="fa fa-shopping-bag me-2 text-white"></i> Tambah ke Keranjang
                            </a>
                        </div>
                        {{-- TAB DESKRIPSI LENGKAP --}}
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button" role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">Deskripsi Lengkap</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <p>{{ $bird->description }}</p>
                                    <div class="px-2">
                                        <div class="row g-4">
                                            <div class="col-6">
                                                <div class="row bg-light align-items-center text-center justify-content-center py-2"><div class="col-6"><p class="mb-0">Berat</p></div><div class="col-6"><p class="mb-0">{{ $bird->weight }}</p></div></div>
                                                <div class="row text-center align-items-center justify-content-center py-2"><div class="col-6"><p class="mb-0">Asal</p></div><div class="col-6"><p class="mb-0">{{ $bird->origin }}</p></div></div>
                                                <div class="row bg-light text-center align-items-center justify-content-center py-2"><div class="col-6"><p class="mb-0">Kualitas</p></div><div class="col-6"><p class="mb-0">{{ $bird->quality }}</p></div></div>
                                                <div class="row text-center align-items-center justify-content-center py-2"><div class="col-6"><p class="mb-0">Kondisi</p></div><div class="col-6"><p class="mb-0">{{ $bird->check }}</p></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SIDEBAR KANAN --}}
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <h4>Kategori</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    <li><div class="fruite-name"><a href="#" class="d-flex"><span class="flex-grow-1"><i class="fas fa-feather me-2"></i>Burung Hias</span><span>({{ $hiasCount }})</span></a></div></li>
                                    <li><div class="fruite-name"><a href="#" class="d-flex"><span class="flex-grow-1"><i class="fas fa-feather me-2"></i>Burung Kicau</span><span>({{ $kicauCount }})</span></a></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection