@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manajemen Produk</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk Baru</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($birds as $bird)
                <tr class="align-middle">
                    <td><img src="{{ asset('img/birds/' . $bird->image) }}" alt="{{ $bird->name }}" style="width: 80px; height: 80px; object-fit: cover;" class="rounded"></td>
                    <td>{{ $bird->name }}</td>
                    <td>Rp {{ number_format($bird->price) }}</td>
                    <td>{{ $bird->type }}</td>
                    <td>
                        <a href="{{ route('products.edit', $bird->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $bird->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $birds->links() }}
@endsection