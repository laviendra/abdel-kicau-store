<div class="col-lg-3 col-md-6 col-12 mb-4">
    <div class="rounded position-relative fruite-item h-100 d-flex flex-column">
        <div class="fruite-img">
            <img src="{{ asset('img/birds/' . $bird['image']) }}" class="img-fluid w-100 rounded-top" alt="{{ $bird['name'] }}">
        </div>
        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
            {{ $bird['type'] }}
        </div>
        <div class="p-4 border border-secondary border-top-0 rounded-bottom d-flex flex-column flex-grow-1">
            {{-- Nama produk menjadi link ke halaman detail --}}
            <h4><a href="{{ url('/shop/' . $bird['slug']) }}" class="text-dark">{{ $bird['name'] }}</a></h4>
            <p class="flex-grow-1">{{ \Illuminate\Support\Str::limit($bird['description'], 70) }}</p>
            <div class="mt-auto text-center">
                {{-- INI TOMBOL YANG SUDAH DIPERBAIKI --}}
                <a href="{{ url('/shop/' . $bird['slug']) }}" class="btn border-0 rounded-pill px-4 py-2 fw-semibold" style="background-color: #a4d65e; color: white;">
                    <i class="fa fa-eye me-2"></i> See More
                </a>

            </div>
        </div>
    </div>
</div>