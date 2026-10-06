@extends('layouts.app')

@section('title', 'Dashboard - Perpustakaan')

@section('content')
<h3 class="mb-4">Dashboard</h3>

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted">Total Buku</div>
                <div class="fs-2 fw-bold">{{ $totalBooks }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted">Total Kategori</div>
                <div class="fs-2 fw-bold">{{ $totalCategories }}</div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-semibold">Buku Terbaru</div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr><th>Judul</th><th>Penulis</th><th>Kategori</th></tr>
            </thead>
            <tbody>
                @forelse ($latestBooks as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category->name }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center text-muted">Belum ada data buku.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection