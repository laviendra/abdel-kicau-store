@extends('layouts.main')
@section('content')

    {{-- Hero Header (Tidak Berubah) --}}
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">100% Burung Berkualitas</h4>
                    <h1 class="mb-5 display-3 text-primary">Aneka Burung Hias & Burung Kicau</h1>
                    <p class="mb-4 fs-5 text-dark" style="max-width: 600px;">
                        Selamat datang di <span class="fw-bold text-primary">Abdel Kicau Mania</span>, toko terpercaya untuk berbagai jenis burung hias dan kicau berkualitas. Temukan burung favoritmu dengan mudah, aman, dan nyaman.
                    </p>
                    <form action="{{ url('/shop') }}" method="GET" class="position-relative mx-auto">
                        <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text" name="search" placeholder="Cari nama burung...">
                        <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Cari Burung</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Features Section (Tidak Berubah) --}}
    <div class="container-fluid py-5" style="background-color: #f8f9fa;">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-5">Kenapa Memilih Kami?</h1>
                <p>Kami tidak hanya menjual, kami memberikan yang terbaik untuk Anda dan calon sahabat berkicau Anda.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4"><div class="p-4 rounded bg-white text-center"><i class="fas fa-check-circle fa-3x text-primary mb-3"></i><h4 class="mb-3">Kualitas Terjamin</h4><p class="mb-0">Setiap burung melewati proses seleksi ketat dan pengecekan kesehatan untuk memastikan kondisi prima.</p></div></div>
                <div class="col-md-6 col-lg-4"><div class="p-4 rounded bg-white text-center"><i class="fas fa-feather-alt fa-3x text-primary mb-3"></i><h4 class="mb-3">Koleksi Lengkap</h4><p class="mb-0">Dari kenari merdu hingga merak yang anggun, kami menyediakan beragam pilihan untuk setiap selera.</p></div></div>
                <div class="col-md-6 col-lg-4"><div class="p-4 rounded bg-white text-center"><i class="fas fa-shipping-fast fa-3x text-primary mb-3"></i><h4 class="mb-3">Pengiriman Aman</h4><p class="mb-0">Dengan prosedur pengiriman khusus, kami memastikan burung sampai di tujuan dengan selamat dan sehat.</p></div></div>
            </div>
        </div>
    </div>

    {{-- Products Section (Tidak Berubah) --}}
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4"><div class="col-lg-4 text-start"><h1>Burung Burung Kami</h1></div><div class="col-lg-8 text-end"><ul class="nav nav-pills d-inline-flex text-center mb-5"><li class="nav-item"><a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1"><span class="text-dark" style="width: 130px;">Semua Burung</span></a></li><li class="nav-item"><a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2"><span class="text-dark" style="width: 130px;">Burung Hias</span></a></li><li class="nav-item"><a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3"><span class="text-dark" style="width: 130px;">Burung Kicau</span></a></li></ul></div></div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active"><div class="row g-4">@foreach($birds as $bird) @include('partials.bird-card3', ['bird' => $bird]) @endforeach</div></div>
                    <div id="tab-2" class="tab-pane fade show p-0"><div class="row g-4">@foreach($birds as $bird) @if($bird['type'] == 'Burung Hias') @include('partials.bird-card3', ['bird' => $bird]) @endif @endforeach</div></div>
                    <div id="tab-3" class="tab-pane fade show p-0"><div class="row g-4">@foreach($birds as $bird) @if($bird['type'] == 'Burung Kicau') @include('partials.bird-card3', ['bird' => $bird]) @endif @endforeach</div></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid banner bg-primary my-5"> {{-- <-- Kelas diubah dari bg-secondary menjadi bg-primary --}}
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-3 text-white">Burung Merak</h1>
                        <p class="fw-normal display-3 text-dark mb-4">primadona kami</p>
                        <p class="mb-4 text-dark">Pancarkan kemewahan dengan ekor kipasnya yang legendaris. Burung Merak adalah simbol keindahan dan keanggunan mutlak.</p>
                        <a href="{{ url('/shop/burung-merak') }}" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BELI SEKARANG</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="{{ asset('img/birds/merak.jpeg') }}" class="img-fluid w-100 rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Testimonial (Tidak Berubah) --}}
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="testimonial-header text-center"><h4 class="text-primary">Testimoni</h4><h1 class="display-5">Apa Kata Pelanggan Kami!</h1></div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item img-border-radius bg-light rounded p-4"><div class="position-relative"><i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i><div class="mb-4 pb-4 border-bottom border-secondary"><p class="mb-0">Pelayanannya luar biasa, burung Murai yang saya beli sehat dan gacor. Pengiriman juga cepat dan aman. Sangat direkomendasikan!</p></div><div class="d-flex align-items-center flex-nowrap"><div class="d-block"><h4 class="text-dark">Budi Santoso</h4><p class="m-0 pb-3">Kicau Mania, Jakarta</p></div></div></div></div>
                <div class="testimonial-item img-border-radius bg-light rounded p-4"><div class="position-relative"><i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i><div class="mb-4 pb-4 border-bottom border-secondary"><p class="mb-0">Awalnya ragu beli Lovebird online, tapi Abdel Kicau Mania membuktikan kualitasnya. Burungnya cantik dan aktif. Terima kasih!</p></div><div class="d-flex align-items-center flex-nowrap"><div class="d-block"><h4 class="text-dark">Siti Aminah</h4><p class="m-0 pb-3">Penghobi Burung, Surabaya</p></div></div></div></div>
                <div class="testimonial-item img-border-radius bg-light rounded p-4"><div class="position-relative"><i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i><div class="mb-4 pb-4 border-bottom border-secondary"><p class="mb-0">Koleksi burung hiasnya juara! Saya dapat Burung Gagak yang eksotis dan sehat. Proses pembelian mudah dan cepat.</p></div><div class="d-flex align-items-center flex-nowrap"><div class="d-block"><h4 class="text-dark">Agus Wijaya</h4><p class="m-0 pb-3">Kolektor, Bandung</p></div></div></div></div>
            </div>
        </div>
    </div>
@endsection