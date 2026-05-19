<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan daftar semua pesanan
    public function index()
    {
        $orders = Order::latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    // Menampilkan detail satu pesanan
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    // Mengupdate status pesanan
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|string']);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Status pesanan berhasil diperbarui.');
    }
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
public function showInvoice(Order $order)
{
    // Mengirim data pesanan ($order) ke piring ('admin.invoice')
    return view('admin.invoice', compact('order'));
}

}