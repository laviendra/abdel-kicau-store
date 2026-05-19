<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Pastikan baris ini ada
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // ... (method index() dan create() Anda biarkan saja) ...
    public function index()
    {
        $birds = Bird::latest()->paginate(10);
        return view('admin.products.index', compact('birds'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Menyimpan produk BARU.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // ... (aturan validasi Anda biarkan saja) ...
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'weight' => 'required|string',
            'origin' => 'required|string',
            'quality' => 'required|string',
            'check' => 'required|string',
        ]);
        
        // Cek jika ada file gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Membuat nama file unik agar tidak bentrok, tapi tetap menyertakan nama asli
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Memindahkan file langsung ke public/img/birds
            $file->move(public_path('img/birds'), $fileName);
            
            // Simpan nama file ini ke database
            $validatedData['image'] = $fileName;
        }

        $validatedData['slug'] = Str::slug($request->name);
        Bird::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    
    // ... (method edit() Anda biarkan saja) ...
    public function edit(Bird $product)
    {
        return view('admin.products.edit', ['bird' => $product]);
    }

    /**
     * Meng-UPDATE produk yang sudah ada.
     */
    public function update(Request $request, Bird $product)
    {
        $validatedData = $request->validate([
            // ... (aturan validasi Anda biarkan saja) ...
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'weight' => 'required|string',
            'origin' => 'required|string',
            'quality' => 'required|string',
            'check' => 'required|string',
        ]);

        $input = $request->except('image'); // Ambil semua input kecuali gambar

        // Cek jika ada file gambar BARU yang di-upload
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('img/birds/' . $product->image);

            // Hapus gambar lama jika ada
            if ($product->image && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Pindahkan gambar baru
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/birds'), $fileName);
            $input['image'] = $fileName;
        }
        
        $validatedData['slug'] = Str::slug($request->name);
        $product->update($input);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk.
     */
    public function destroy(Bird $product)
    {
        $imagePath = public_path('img/birds/' . $product->image);
        // Hapus file gambar jika ada
        if ($product->image && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}