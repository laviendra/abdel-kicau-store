@extends('admin.layouts.app')
@section('content')
    <h1>Tambah Produk Baru</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3"><label class="form-label">Nama Burung</label><input type="text" name="name" class="form-control"></div>
                        <div class="mb-3"><label class="form-label">Deskripsi</label><textarea name="description" class="form-control" rows="4"></textarea></div>
                        <div class="mb-3"><label class="form-label">Gambar Produk</label><input type="file" name="image" class="form-control"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3"><label class="form-label">Harga</label><input type="number" name="price" class="form-control"></div>
                        <div class="mb-3"><label class="form-label">Kategori</label><select name="type" class="form-select"><option value="Burung Hias">Burung Hias</option><option value="Burung Kicau">Burung Kicau</option></select></div>
                        <div class="mb-3"><label class="form-label">Berat</label><input type="text" name="weight" class="form-control"></div>
                        <div class="mb-3"><label class="form-label">Asal</label><input type="text" name="origin" class="form-control"></div>
                        <div class="mb-3"><label class="form-label">Kualitas</label><input type="text" name="quality" class="form-control"></div>
                        <div class="mb-3"><label class="form-label">Kondisi</label><input type="text" name="check" class="form-control"></div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan Produk</button>
    </form>
@endsection