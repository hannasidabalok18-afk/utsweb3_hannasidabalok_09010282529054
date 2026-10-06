@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4 shadow-sm">
            <div class="card-body">
                <h4 class="fw-bold mb-4" style="color: var(--sage-dark);">Tambah Buku Baru</h4>

                <form method="POST" action="{{ route('books.store') }}">
                    @csrf

                    @include('books._form')

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection