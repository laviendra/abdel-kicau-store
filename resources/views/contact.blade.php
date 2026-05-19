@extends('layouts.main')
@section('content')
    <div class="container-fluid page-header py-5 mb-5" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('img/bg-burung.png') }}') center center / cover no-repeat;">
        <h1 class="text-center text-white display-3 animated fadeIn">Hubungi Kami</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active text-white">Hubungi Kami</li>
        </ol>
    </div>
    <div class="container-fluid py-5" style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-5">Tim Kami (Kelompok B)</h1>
            <p>Website ini merupakan buah karya dari Kelompok B sebagai proyek tugas untuk mendalami pengembangan web dengan Laravel. Kenali tim di balik layar "Abdel Kicau Mania" dengan Tema Jual Beli Burung.</p>
        </div>
        {{-- Grid diubah untuk 4 anggota --}}
        <div class="row g-4 justify-content-center">
            {{-- Kartu Anggota Tim 1 --}}
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('img/tim/roni.jpeg') }}" class="card-img-top" alt="Anggota Tim">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3">Roni Syaki Prakoso</h5>
                        {{-- Posisi dihilangkan --}}
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-outline-primary mx-1" href="https://www.instagram.com/sh1motoki?igsh=MXg3ZDRvazV2ZDl5bg=="><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-outline-primary mx-1" href="https://wa.me/6289681936591?text=halo%20mas"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Kartu Anggota Tim 2 --}}
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('img/tim/radit.jpeg') }}" class="card-img-top" alt="Anggota Tim">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3">Rafli Praditta</h5>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-outline-primary mx-1" href="https://www.instagram.com/pdtta_?igsh=MWpwOWhhazBwbmdpYw=="><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-outline-primary mx-1" href="https://wa.me/6281211749731?text=halo%20mas"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Kartu Anggota Tim 3 --}}
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('img/tim/paldo.jpeg') }}" class="card-img-top" alt="Anggota Tim">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3">Rifaldo Firmansyah</h5>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-outline-primary mx-1" href="https://www.instagram.com/faldomnsyh?igsh=enNqM2U0djgyb2Ez"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-outline-primary mx-1" href="https://wa.me/6285780941262?text=halo%20mas"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Kartu Anggota Tim 4 --}}
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('img/tim/el.jpeg') }}" class="card-img-top" alt="Anggota Tim">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3">Abdel Khaer Ardana Putra</h5>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-outline-primary mx-1" href="https://www.instagram.com/el.khaer?igsh=bmFoandtdHo5OHIy"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-outline-primary mx-1" href="https://wa.me/6285774487188?text=halo%20mas"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection