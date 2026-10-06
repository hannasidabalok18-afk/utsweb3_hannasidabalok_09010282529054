@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <div class="card-body">
                <h4 class="mb-4 font-weight-bold" style="color: var(--sage-dark);">Edit Data Buku</h4>

                <form method="POST" action="{{ route('books.update', $book) }}">
                    @csrf
                    @method('PUT')

                    @include('books._form')

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection