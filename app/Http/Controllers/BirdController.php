<?php

namespace App\Http\Controllers;

use App\Models\Bird; // <-- Gunakan Model Bird, bukan array lagi
use Illuminate\Http\Request;

class BirdController extends Controller
{
    // KITA TIDAK PERLU ARRAY DAN CONSTRUCTOR LAGI DI SINI
    // SEMUA DATA SEKARANG ADA DI DATABASE

    public function showHome()
    {
        // Ambil 9 burung terbaru dari database untuk ditampilkan di home
        $birds = Bird::latest()->take(9)->get();
        return view('home', ['birds' => $birds]);
    }

    public function showShop(Request $request)
    {
        $query = Bird::query(); // Mulai query ke database

        // Logika pencarian, sekarang mencari di database
        if ($request->has('search') && $request->input('search') != '') {
            $keyword = $request->input('search');
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                  ->orWhere('description', 'like', '%' . $keyword . '%');
            });
        }

        // Ambil hasil dengan pagination langsung dari database (3 item per halaman)
        $birds = $query->paginate(3)->withQueryString();

        // Data untuk sidebar (dihitung dari database)
        $hiasCount = Bird::where('type', 'Burung Hias')->count();
        $kicauCount = Bird::where('type', 'Burung Kicau')->count();

        return view('shop', [
            'birds' => $birds,
            'hiasCount' => $hiasCount,
            'kicauCount' => $kicauCount
        ]);
    }

    public function show($slug)
    {
        // Cari satu burung berdasarkan slug dari database
        $bird = Bird::where('slug', $slug)->firstOrFail();
        
        // Data untuk sidebar
        $hiasCount = Bird::where('type', 'Burung Hias')->count();
        $kicauCount = Bird::where('type', 'Burung Kicau')->count();

        return view('shop-detail', [
            'bird' => $bird,
            'hiasCount' => $hiasCount,
            'kicauCount' => $kicauCount
        ]);
    }
}