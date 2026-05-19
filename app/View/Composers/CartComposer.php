<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $cartCount = 0;
        if (Auth::check()) {
            // Jika user login, hitung jumlah item di keranjang dari database
            $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
        }
        
        // Kirim variabel $cartCount ke view
        $view->with('cartCount', $cartCount);
    }
}