@extends('admin.layouts.app')
@section('content')
    <h1>Edit Produk: {{ $bird->name }}</h1>

    {{-- Menampilkan daftar semua error validasi di bagian atas --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ======================= PERUBAHAN UTAMA DI SINI ======================= --}}
    {{-- Kita secara eksplisit memberitahu route bahwa parameter 'product' diisi oleh $bird->id --}}
    <form action="{{ route('products.update', $bird) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail Utama Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama Burung</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $bird->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $bird->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="image">Ganti Gambar (Kosongkan jika tidak diubah)</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                             @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        @if($bird->image)
                            <div class="mt-2">
                                <label class="form-label d-block">Gambar Saat Ini:</label>
                                {{-- Path ini sudah benar untuk menampilkan gambar dari public/img/birds/ --}}
                                <img src="{{ asset('img/birds/' . $bird->image) }}" alt="Gambar {{ $bird->name }}" style="width: 150px; height: 150px; object-fit: cover;" class="rounded">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                     <div class="card-header">
                        <h5 class="card-title mb-0">Atribut Produk</h5>
                    </div>
                    <div class="card-body">
                        {{-- ...sisa form Anda sudah benar... --}}
                        <div class="mb-3">
                            <label class="form-label" for="price">Harga</label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $bird->price) }}">
                             @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="type">Kategori</label>
                            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                                <option value="Burung Hias" {{ old('type', $bird->type) == 'Burung Hias' ? 'selected' : '' }}>Burung Hias</option>
                                <option value="Burung Kicau" {{ old('type', $bird->type) == 'Burung Kicau' ? 'selected' : '' }}>Burung Kicau</option>
                            </select>
                             @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="weight">Berat (gram)</label>
                            <input type="text" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight', $bird->weight) }}">
                             @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="origin">Asal</label>
                            <input type="text" name="origin" id="origin" class="form-control @error('origin') is-invalid @enderror" value="{{ old('origin', $bird->origin) }}">
                             @error('origin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3"><label class="form-label">Kualitas</label><input type="text" name="quality" class="form-control" value="{{ old('quality', $bird->quality) }}"></div>
                        <div class="mb-3"><label class="form-label">Kondisi</label><input type="text" name="check" class="form-control" value="{{ old('check', $bird->check) }}"></div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Produk</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
@endsection