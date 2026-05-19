<div class="col-md-6 col-lg-6 col-xl-4 mb-4">
    <div class="rounded position-relative fruite-item h-100 d-flex flex-column">
      <div class="fruite-img">
            <img src="{{ asset('img/birds/' . $bird['image']) }}" class="img-fluid w-100 rounded-top" alt="{{ $bird['name'] }}">
      </div>
        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
            {{ $bird['type'] }}
        </div>
        <div class="p-4 border border-secondary border-top-0 rounded-bottom d-flex flex-column flex-grow-1">
            <h4><a href="{{ url('/shop/'. $bird['slug']) }}" class="text-dark">{{ $bird['name'] }}</a></h4>
            <p class="flex-grow-1">{{ \Illuminate\Support\Str::limit($bird['description'], 60) }}</p>
            <div class="mt-auto text-center">
                <p class="text-dark fs-5 fw-bold mb-2">Rp {{ number_format($bird['price'], 0, ',', '.') }}</p>
                <a href="#" class="btn border-0 rounded-pill px-4 py-2 fw-semibold" style="background-color: #a4d65e; color: white;">
                    <i class="fa fa-shopping-bag me-2"></i> Tambah
                </a>
            </div>
        </div>
    </div>
</div>