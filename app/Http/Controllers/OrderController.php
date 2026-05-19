<?php

namespace App\Http\Controllers;

use App\Models\Bird;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Method untuk menampilkan halaman riwayat pesanan.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('items.bird')->latest()->paginate(10);
        return view('my-orders', compact('orders'));
    }

    /**
     * Method untuk memproses pesanan dari halaman checkout.
     */
    public function placeOrder(Request $request)
    {
        $request->validate(['first_name' => 'required', 'last_name' => 'required', 'address' => 'required', 'city' => 'required', 'post_code' => 'required', 'phone' => 'required', 'email' => 'required|email', 'payment_method' => 'required']);

        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('shop')->with('error', 'Keranjang Anda kosong!');
        }

        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $bird = Bird::find($item->bird_id);
            $totalPrice += $bird->price * $item->quantity;
        }

        $order = Order::create([
            'user_id' => $userId, 'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email, 'phone' => $request->phone, 'address' => $request->address,
            'city' => $request->city, 'post_code' => $request->post_code,
            'total_price' => $totalPrice, 'payment_method' => $request->payment_method,
        ]);

        foreach ($cartItems as $item) {
            $bird = Bird::find($item->bird_id);
            OrderItem::create([
                'order_id' => $order->id, 'bird_id' => $item->bird_id,
                'quantity' => $item->quantity, 'price' => $bird->price,
            ]);
        }

        Cart::where('user_id', $userId)->delete();

        return redirect()->route('orders.index')->with('success', 'Pesanan Anda telah berhasil dibuat!');
    }

    /**
     * Method BARU untuk menampilkan halaman konfirmasi pembayaran.
     */
    public function showConfirmationPage(Order $order)
    {
        // Pastikan hanya pemilik order yang bisa mengakses halaman ini
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Kirim data pesanan ke view 'payment-confirmation'
        return view('payment-confirmation', compact('order'));
    }

    /**
     * Method LAMA (uploadProof) yang diganti nama untuk memproses upload.
     */
    public function storeConfirmation(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('payment_proof')->store('proofs', 'public');

        $order->payment_proof = $path;
        $order->status = 'menunggu konfirmasi';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Bukti transfer berhasil di-upload dan sedang kami verifikasi.');
    }
    /**
 * Method BARU untuk menampilkan halaman invoice.
 */
public function showInvoice(Order $order)
{
    // Keamanan: Pastikan hanya pemilik order yang bisa melihat invoice-nya
    if ($order->user_id !== Auth::id()) {
        abort(403, 'Akses Ditolak');
    }

    // Kirim data pesanan ke view 'invoice'
    return view('invoice', compact('order'));
}
/**
 * Method BARU untuk mengubah status pesanan menjadi 'selesai' oleh pelanggan.
 */
public function receiveOrder(Order $order)
{
    // Keamanan: Pastikan hanya pemilik order yang bisa melakukan ini
    if ($order->user_id !== Auth::id()) {
        abort(403);
    }

    // Ubah status pesanan menjadi 'selesai'
    $order->status = 'selesai';
    $order->save();

    // Kembali ke halaman riwayat dengan pesan sukses
    return redirect()->route('orders.index')->with('success', 'Terima kasih telah mengonfirmasi pesanan Anda!');
}
}