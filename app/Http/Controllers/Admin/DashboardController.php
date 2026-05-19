<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Bird;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Total pendapatan dari pesanan yang selesai
        $totalRevenue = Order::where('status', 'selesai')->sum('total_price');

        // Total pesanan yang terjual (status selesai)
        $totalSoldOrders = Order::where('status', 'selesai')->count();

        // Total produk
        $totalProducts = Bird::count();

        // Pesanan terbaru (5 terakhir)
        $recentOrders = Order::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('totalRevenue', 'totalSoldOrders', 'totalProducts', 'recentOrders'));
    }
}