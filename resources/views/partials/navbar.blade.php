<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<div class="container-fluid fixed-top">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Abdel Kicau Mania" style="height: 40px; margin-right: 10px;">
                <h1 class="text-primary display-6">Abdel Kicau Mania</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('/shop') }}" class="nav-item nav-link {{ request()->is('shop*') ? 'active' : '' }}">Koleksi</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">Tentang Kami</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Kontak Kami</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                        data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search text-primary"></i>
                    </button>
                    <a href="{{ route('checkout.show') }}" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span id="cart-count" class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                            style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                            {{ $cartCount ?? 0 }}
                        </span>
                    </a>
                    
                    {{-- #################### BLOK IKON USER YANG DIPERBAIKI TOTAL #################### --}}
                    @guest
                        {{-- Tampilkan ini jika pengguna belum login --}}
                        <a href="{{ route('login') }}" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    @else
                        {{-- Tampilkan ini jika pengguna sudah login --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle my-auto" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end m-0 bg-white rounded-0 shadow-sm">
                                <span class="dropdown-item-text"><strong>{{ Auth::user()->name }}</strong></span>
                                <div class="dropdown-divider"></div>

                                @if (Auth::user()->is_admin)
                                    <h6 class="dropdown-header">Tampilan Admin</h6>
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                        <i class="fas fa-tachometer-alt fa-fw me-2"></i>Admin Panel
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endif

                                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                    <i class="fas fa-user-cog fa-fw me-2"></i>Profile
                                </a>
                                <a href="{{ route('orders.index') }}" class="dropdown-item">
                                    <i class="fas fa-history fa-fw me-2"></i>Riwayat Pesanan
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}" class="m-0">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item" 
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="fas fa-sign-out-alt fa-fw me-2"></i>Logout
                                    </a>
                                </form>
                            </div>
                        </div>
                    @endguest
                    
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen"><div class="modal-content rounded-0"><div class="modal-header"><h5 class="modal-title">Cari Berdasarkan Kata Kunci</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body d-flex align-items-center"><form action="{{ url('/shop') }}" method="GET" class="input-group w-75 mx-auto d-flex"><input type="search" name="search" class="form-control p-3" placeholder="Ketik nama burung..." value="{{ request('search') }}"><button type="submit" class="input-group-text p-3"><i class="fa fa-search"></i></button></form></div></div></div>
</div>