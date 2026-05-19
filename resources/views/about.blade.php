@extends('layouts.main')
@section('content')
    <div class="container-fluid page-header py-5 mb-5" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('img/bg-burung.png') }}') center center / cover no-repeat;">
        <h1 class="text-center text-white display-3 animated fadeIn">Tentang Abdel Kicau Mania</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active text-white">Tentang Kami</li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid rounded shadow" src="{{ asset('img/burung1.png') }}" alt="Tentang Abdel Kicau Mania">
                </div>
                <div class="col-lg-6">
                    <h4 class="text-secondary">Selamat Datang di Surga Para Kicau Mania</h4>
                    <h1 class="display-5 mb-4">Pilihan Terbaik Untuk Hobi Anda</h1>
                    <p class="mb-4">
                        Di <span class="fw-bold text-primary">Abdel Kicau Mania</span>, kami percaya bahwa setiap burung memiliki keindahan dan keunikan tersendiri. Berawal dari hobi dan kecintaan mendalam terhadap dunia avifauna, kami mendedikasikan diri untuk menyediakan burung-burung hias dan kicau dengan kualitas terbaik.
                    </p>
                    <p class="mb-4">
                        Misi kami adalah menjadi mitra terpercaya Anda dalam merawat dan memelihara burung kesayangan, dengan menyediakan koleksi yang sehat, terawat, dan siap untuk menjadi bagian dari keluarga Anda.
                    </p>
                    <a href="{{ url('/shop') }}" class="btn btn-primary rounded-pill py-3 px-5">Lihat Koleksi Kami</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-5">Proses & Jaminan Kami</h1>
                <p>Kami memastikan kualitas terbaik melalui proses yang teliti di setiap tahap.</p>
            </div>
            <div class="row g-4">
                {{-- Card Proses dibuat lebih menonjol dengan shadow --}}
                <div class="col-md-6 col-lg-4"><div class="p-4 rounded bg-white text-center h-100 shadow-sm"><i class="fas fa-search-plus fa-3x text-primary mb-3"></i><h4 class="mb-3">1. Seleksi Ketat</h4><p class="mb-0">Kami hanya memilih burung dari peternak terpercaya dengan rekam jejak yang jelas.</p></div></div>
                <div class="col-md-6 col-lg-4"><div class="p-4 rounded bg-white text-center h-100 shadow-sm"><i class="fas fa-heartbeat fa-3x text-primary mb-3"></i><h4 class="mb-3">2. Perawatan Profesional</h4><p class="mb-0">Setiap burung mendapatkan nutrisi terbaik dan pemantauan kesehatan harian oleh tim kami.</p></div></div>
                <div class="col-md-6 col-lg-4"><div class="p-4 rounded bg-white text-center h-100 shadow-sm"><i class="fas fa-box-open fa-3x text-primary mb-3"></i><h4 class="mb-3">3. Pengiriman Aman</h4><p class="mb-0">Dengan kandang khusus, kami menjamin burung Anda tiba dengan aman, nyaman, dan bebas stres.</p></div></div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5" style="background-color: #f8f9fa;">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-5">Galeri Kami</h1>
                <p>Lihat keindahan beberapa koleksi terbaik dari Abdel Kicau Mania.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3"><img src="{{ asset('img/birds/murai.jpeg') }}" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;" alt="Galeri Burung"></div>
                <div class="col-md-6 col-lg-3"><img src="{{ asset('img/birds/jalak_bali.jpeg') }}" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;" alt="Galeri Burung"></div>
                <div class="col-md-6 col-lg-3"><img src="{{ asset('img/birds/kenari.jpeg') }}" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;" alt="Galeri Burung"></div>
                <div class="col-md-6 col-lg-3"><img src="{{ asset('img/birds/cucak_ijo.jpeg') }}" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;" alt="Galeri Burung"></div>
            </div>
        </div>
    </div>
    {{-- Testimonial (Tidak Berubah) --}}
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="testimonial-header text-center"><h4 class="text-primary">Testimoni</h4><h1 class="display-5">Apa Kata Pelanggan Kami!</h1></div>
            <div class="owl-carousel testimonial-carousel">
                {{-- ... (Isi testimoni tidak berubah) ... --}}
                <div class="testimonial-item img-border-radius bg-light rounded p-4"><div class="position-relative"><i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i><div class="mb-4 pb-4 border-bottom border-secondary"><p class="mb-0">Pelayanannya luar biasa, burung Murai yang saya beli sehat dan gacor. Pengiriman juga cepat dan aman. Sangat direkomendasikan!</p></div><div class="d-flex align-items-center flex-nowrap"><div class="d-block"><h4 class="text-dark">Budi Santoso</h4><p class="m-0 pb-3">Kicau Mania, Jakarta</p></div></div></div></div>
                <div class="testimonial-item img-border-radius bg-light rounded p-4"><div class="position-relative"><i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i><div class="mb-4 pb-4 border-bottom border-secondary"><p class="mb-0">Awalnya ragu beli Lovebird online, tapi Abdel Kicau Mania membuktikan kualitasnya. Burungnya cantik dan aktif. Terima kasih!</p></div><div class="d-flex align-items-center flex-nowrap"><div class="d-block"><h4 class="text-dark">Siti Aminah</h4><p class="m-0 pb-3">Penghobi Burung, Surabaya</p></div></div></div></div>
            </div>
        </div>
    </div>
@endsection