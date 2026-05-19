<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5);">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#">
                        <h1 class="text-primary mb-0">Abdel Kicau Mania</h1>
                        <p class="text-secondary mb-0">Burung Hias & Burung Kicau</p>
                    </a>
                </div>

                <div class="col-lg-6">
                    <div class="footer-item">
                        {{-- DITAMBAHKAN: class "text-center" untuk menengahkan judul --}}
                        <h4 class="text-light mb-3 text-center">Galeri Burung Kami</h4>
                        
                        {{-- ======================= PERUBAHAN UTAMA DI SINI ======================= --}}
                        {{-- DITAMBAHKAN: class "justify-content-center" untuk menengahkan gambar --}}
                        <div class="d-flex flex-wrap justify-content-center">
                            <a href="/shop"><img src="{{ asset('img/birds/kenari.jpeg') }}" class="img-fluid rounded m-1" style="width: 70px; height: 70px; object-fit: cover;" alt="Galeri Burung 1"></a>
                            <a href="/shop"><img src="{{ asset('img/birds/jalak_bali.jpeg') }}" class="img-fluid rounded m-1" style="width: 70px; height: 70px; object-fit: cover;" alt="Galeri Burung 2"></a>
                            <a href="/shop"><img src="{{ asset('img/birds/cucak_ijo.jpeg') }}" class="img-fluid rounded m-1" style="width: 70px; height: 70px; object-fit: cover;" alt="Galeri Burung 3"></a>
                            <a href="/shop"><img src="{{ asset('img/birds/merak.jpeg') }}" class="img-fluid rounded m-1" style="width: 70px; height: 70px; object-fit: cover;" alt="Galeri Burung 4"></a>
                            <a href="/shop"><img src="{{ asset('img/birds/murai.jpeg') }}" class="img-fluid rounded m-1" style="width: 70px; height: 70px; object-fit: cover;" alt="Galeri Burung 5"></a>
                            <a href="/shop"><img src="{{ asset('img/birds/merpati.jpeg') }}" class="img-fluid rounded m-1" style="width: 70px; height: 70px; object-fit: cover;" alt="Galeri Burung 6"></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sisa kode footer Anda (tidak ada perubahan di sini) --}}
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Tentang Kami</h4>
                    <p class="mb-4">Abdel Kicau Mania menyediakan berbagai jenis burung hias dan burung kicau berkualitas tinggi dengan harga terjangkau.</p>
                    <a href="/about" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Informasi Toko</h4>
                    <a class="btn-link" href="/">Tentang Kami</a>
                    <a class="btn-link" href="/contact">Hubungi Kami</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Akun</h4>
                    <a class="btn-link" href="/checkout">Keranjang</a>
                    <a class="btn-link" href="/my-orders">Riwayat Pesanan</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Kontak Kami</h4>
                    <p>Alamat: Jl. Kenari No.10, Jakarta</p>
                    <p>Email: info@Abdelkicaumania.com</p>
                    <p>Telepon: +62 896 8193 6591</p>
                    <p>Metode Pembayaran</p>
                    <img src="{{ asset('img/payment.png') }}" class="img-fluid" alt="Metode Pembayaran">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid copyright bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="/about"><i class="fas fa-copyright text-light me-2"></i>Abdel Kicau Mania</a>, All rights reserved.</span>
            </div>
            <div class="col-md-6 my-auto text-center text-md-end text-white">
                Designed By <a class="border-bottom" href="/contact">Kelompok B</a>
            </div>
        </div>
    </div>
</div>