<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View; // <-- Tambahkan ini
use App\View\Composers\CartComposer; // <-- Tambahkan ini

class AppServiceProvider extends ServiceProvider
{
    // ... (method register) ...

    public function boot(): void
    {
        Paginator::useBootstrapFive();
        
        // Daftarkan CartComposer untuk semua view
        View::composer('*', CartComposer::class);
    }
}