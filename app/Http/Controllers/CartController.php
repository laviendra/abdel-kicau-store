<?php

namespace App\Http\Controllers;

use App\Models\Bird;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // app/Http/Controllers/CartController.php

public function add(Request $request, $id)
{
    // Ambil jumlah dari request, jika tidak ada, default-nya 1
    $quantityToAdd = $request->input('quantity', 1);

    $userId = Auth::id();
    $cartItem = Cart::where('user_id', $userId)->where('bird_id', $id)->first();

    if ($cartItem) {
        // Jika sudah ada, tambahkan jumlahnya
        $cartItem->quantity += $quantityToAdd;
        $cartItem->save();
    } else {
        // Jika belum ada, buat item baru dengan jumlah yang ditentukan
        Cart::create([
            'user_id' => $userId,
            'bird_id' => $id,
            'quantity' => $quantityToAdd,
        ]);
    }

    $cartCount = Cart::where('user_id', $userId)->sum('quantity');

    if ($request->ajax()) {
        return response()->json(['success' => 'Burung berhasil ditambahkan!', 'cartCount' => $cartCount]);
    }

    return redirect()->back()->with('success', 'Burung berhasil ditambahkan ke keranjang!');
}
    public function show()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->with('bird')->get();
        return view('checkout', compact('cartItems'));
    }

    // === METHOD UPDATE DENGAN AJAX LENGKAP ===
    public function update(Request $request, $id)
    {
        $userId = Auth::id();
        $cartItem = Cart::where('id', $id)->where('user_id', $userId)->first();

        if ($cartItem && $request->quantity > 0) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        if($request->ajax()) {
            // Hitung kembali semua total
            $totalPrice = 0;
            $userCart = Cart::where('user_id', $userId)->with('bird')->get();
            foreach($userCart as $item) {
                $totalPrice += $item->bird->price * $item->quantity;
            }
            
            $newCartCount = $userCart->sum('quantity');

            return response()->json([
                'success'       => true,
                'cartCount'     => $newCartCount,
                'newSubtotal'   => $cartItem->bird->price * $cartItem->quantity,
                'newGrandTotal' => $totalPrice
            ]);
        }

        return redirect()->back()->with('success', 'Jumlah barang berhasil diupdate.');
    }

    public function remove($id)
    {
        $userId = Auth::id();
        $cartItem = Cart::where('id', $id)->where('user_id', $userId)->first();

        if ($cartItem) {
            $cartItem->delete();
        }
        return redirect()->back()->with('success', 'Barang berhasil dihapus dari keranjang.');
    }
}