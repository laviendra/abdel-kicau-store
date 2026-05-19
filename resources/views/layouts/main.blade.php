<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'BirdStore')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Library Stylesheets -->
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap & Template Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .product-image-fixed {
            height: 210px; /* Atur tinggi gambar sesuai keinginan */
            width: 100%;   /* Biarkan lebar mengikuti kartu */
            object-fit: cover; /* Ini bagian paling penting! */
            object-position: center; /* Posisi gambar di tengah */
        }
    </style>
</head>

<body>
    {{-- ======== NAVBAR (HEADER) ======== --}}
    @include('partials.navbar')

    {{-- ======== ISI KONTEN HALAMAN ======== --}}
    <div class="container pt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
    <main>
        @yield('content')
    </main>

    {{-- ======== FOOTER ======== --}}
    @include('partials.footer')

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- resources/views/layouts/main.blade.php --}}

    {{-- ... (kode footer dan script lainnya) ... --}}

    {{-- TAMBAHKAN KODE SCRIPT DI BAWAH INI --}}
    <script>
$(document).ready(function() {
    // Ketika tombol dengan class .add-to-cart-btn diklik
    $(document).on('click', '.add-to-cart-btn', function(e) {
        e.preventDefault(); // Mencegah link pindah halaman

        var button = $(this);
        var url = button.attr('href'); // URL dasar, misal: /cart/add/5

        // Cek apakah ada kotak input jumlah di halaman ini
        var quantityInput = $('#quantity-input');
        if (quantityInput.length > 0) {
            var quantity = quantityInput.val();
            // Tambahkan jumlah sebagai parameter di URL
            url += '?quantity=' + quantity;
        }

        var originalContent = button.html();
        button.html('<i class="fa fa-spinner fa-spin"></i> Menambahkan...');
        button.prop('disabled', true);

        $.ajax({
            url: url, // Gunakan URL yang sudah dimodifikasi
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                button.html('<i class="fa fa-check"></i> Ditambahkan');
                $('#cart-count').text(response.cartCount);

                setTimeout(function() {
                    button.html(originalContent);
                    button.prop('disabled', false);
                }, 2000);
            },
            error: function() {
                button.html(originalContent);
                button.prop('disabled', false);
                alert('Gagal menambahkan ke keranjang.');
            }
        });
    });
});
</script>
</body>
</html>

