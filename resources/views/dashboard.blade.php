@extends('layouts.app')

@section('content')
<!-- Banner Selamat Datang Premium -->
<div class="banner-welcome mb-4 shadow-sm">
    <span class="badge bg-white bg-opacity-20 text-white rounded-pill px-3 py-1 mb-2" style="font-size: 11px;">OVERVIEW</span>
    <h2 class="fw-bold mb-1">Selamat datang kembali, {{ Auth::user()->name ?? 'Hanna' }}! 👋</h2>
    <p class="m-0 text-white-50" style="font-size: 14px;">Kelola seluruh koleksi buku dan data perpustakaan dalam satu tampilan terpadu.</p>
</div>

<!-- Card Statistik Modern & Quick Access -->
<div class="row g-4 mb-4">
    <!-- Total Buku -->
    <div class="col-md-4">
        <div class="card card-stat p-3 shadow-sm h-100">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-box-sage">
                    <i class="bi bi-book-half"></i>
                </div>
                <div>
                    <span class="text-muted small fw-medium">Total Koleksi Buku</span>
                    <h2 class="fw-bold m-0" style="color: var(--sage-dark);">{{ $totalBooks ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Kategori -->
    <div class="col-md-4">
        <div class="card card-stat p-3 shadow-sm h-100">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-box-sage">
                    <i class="bi bi-folder2-open"></i>
                </div>
                <div>
                    <span class="text-muted small fw-medium">Kategori Terdaftar</span>
                    <h2 class="fw-bold m-0" style="color: var(--sage-dark);">{{ $totalCategories ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Akses Cepat -->
    <div class="col-md-4">
        <a href="{{ route('books.create') }}" class="text-decoration-none">
            <div class="card card-stat btn-quick-add p-3 h-100 d-flex flex-row align-items-center justify-content-between px-4">
                <div>
                    <span class="text-white-50 small d-block" style="font-size: 11px;">AKSES CEPAT</span>
                    <h5 class="fw-bold text-white m-0">+ Tambah Buku Baru</h5>
                </div>
                <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="bi bi-arrow-right fs-5 text-white"></i>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Tabel Buku Terbaru Estetik -->
<div class="custom-table-card shadow-sm">
    <div class="py-3 px-4 bg-white d-flex justify-content-between align-items-center border-bottom border-light">
        <div>
            <h5 class="fw-bold m-0" style="color: var(--sage-dark);">Koleksi Buku Terbaru</h5>
            <small class="text-muted">5 buku yang baru ditambahkan ke sistem</small>
        </div>
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold">
            Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">Judul Buku</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Tahun</th>
                    <th class="pe-4">Stok Available</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td class="ps-4 fw-semibold text-dark">{{ $book->title }}</td>
                        <td class="text-muted">{{ $book->author }}</td>
                        <td>
                            <span class="badge-sage">
                                {{ $book->category->name ?? 'Uncategorized' }}
                            </span>
                        </td>
                        <td class="text-muted">{{ $book->year }}</td>
                        <td class="pe-4">
                            <span class="fw-bold" style="color: var(--sage-dark);">{{ $book->stock }}</span> <small class="text-muted">Unit</small>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-muted"></i>
                            Belum ada data buku tersimpan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection