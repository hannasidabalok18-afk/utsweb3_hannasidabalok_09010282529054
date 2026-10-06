@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1" style="color: var(--sage-dark);">Daftar Buku</h3>
        <p class="text-muted small m-0">Kelola seluruh data koleksi buku perpustakaan</p>
    </div>
    <!-- Tombol Create -->
    <a href="{{ route('books.create') }}" class="btn btn-primary shadow-sm">+ Tambah Buku Baru</a>
</div>

<!-- Form Fitur Bonus: Pencarian & Filter Kategori -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <form action="{{ route('books.index') }}" method="GET" class="row g-3">
            <!-- Input Cari Judul / Penulis -->
            <div class="col-md-5">
                <input type="text" name="search" class="form-control" 
                       placeholder="Cari judul atau penulis..." 
                       value="{{ request('search') }}">
            </div>

            <!-- Dropdown Filter Kategori -->
            <div class="col-md-4">
                <select name="category_id" class="form-select">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Cari & Reset -->
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
                @if(request('search') || request('category_id'))
                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Card Tabel -->
<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3">Judul</th>
                        <th class="py-3">Penulis</th>
                        <th class="py-3">Penerbit</th>
                        <th class="py-3">Kategori</th>
                        <th class="text-center py-3">Stok</th>
                        <th class="text-center py-3 pe-4">Aksi (CRUD)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td class="ps-4 fw-semibold">{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>
                                <span class="badge-sage">{{ $book->category->name ?? 'Tanpa Kategori' }}</span>
                            </td>
                            <td class="text-center fw-bold" style="color: var(--sage-dark);">{{ $book->stock }}</td>
                            
                            <!-- Tombol Aksi CRUD -->
                            <td class="text-center pe-4">
                                <div class="btn-group gap-1" role="group">
                                    <!-- Read / Detail -->
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-secondary rounded-2">Detail</a>
                                    
                                    <!-- Update / Edit -->
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-warning rounded-2">Edit</a>
                                    
                                    <!-- Delete -->
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-2">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada data buku yang tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Link Pagination -->
    @if($books->hasPages())
        <div class="card-footer bg-white border-0 py-3">
            {{ $books->links() }}
        </div>
    @endif
</div>
@endsection