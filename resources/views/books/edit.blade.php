@extends('layouts.app')

@section('title', 'Edit Buku - Perpustakaan')

@section('content')
<h3 class="mb-3">Edit Buku</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('books.update', $book) }}">
            @method('PUT')
            @include('books._form')

            <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</div>
@endsection