@extends('layouts.main')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Koleksi Burung</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active text-white">Koleksi</a></li>
        </ol>
    </div>
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Koleksi Burung Eksotis</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    {{-- 1. FORM PENCARIAN DIBUAT FUNGSIONAL --}}
                    <form action="{{ url('/shop') }}" method="GET" class="input-group d-flex" style="max-width: 300px; margin-bottom: 20px;">
                        <input type="search" name="search" class="form-control p-2" placeholder="Cari burung..." value="{{ request('search') }}">
                        <button type="submit" id="search-icon-1" class="input-group-text p-2">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Kategori Burung</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <li>
                                            <div class="fruite-name">
                                                <a href="#" class="d-flex">
                                                    <span class="flex-grow-1"><i class="fas fa-feather me-2"></i>Burung Hias</span>
                                                    <span>({{ $hiasCount }})</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="fruite-name">
                                                <a href="#" class="d-flex">
                                                    <span class="flex-grow-1"><i class="fas fa-feather me-2"></i>Burung Kicau</span>
                                                    <span>({{ $kicauCount }})</span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="{{ asset('img/burung.png') }}" class="img-fluid w-100 rounded" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">
                            {{-- 2. MENGGUNAKAN @forelse AGAR BISA MENAMPILKAN PESAN JIKA KOSONG --}}
                            @forelse($birds as $bird)
                                @include('partials.bird-card2', ['bird' => $bird])
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-warning text-center">
                                        <h4>Oops! Burung tidak ditemukan.</h4>
                                        <p>Coba gunakan kata kunci lain.</p>
                                        <a href="{{ url('/shop') }}" class="btn btn-secondary rounded-pill">Lihat Semua Burung</a>
                                    </div>
                                </div>
                            @endforelse

                            <div class="col-12">
                                {{-- 4. BLOK PAGINATION DIGANTI DENGAN KODE DINAMIS LARAVEL --}}
                                <div class="d-flex justify-content-center mt-5">
                                    {{ $birds->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection