@csrf

<div class="mb-3">
    <label for="title" class="form-label">Judul</label>
    <input type="text" name="title" id="title"
           class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $book->title ?? '') }}">
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="author" class="form-label">Penulis</label>
    <input type="text" name="author" id="author"
           class="form-control @error('author') is-invalid @enderror"
           value="{{ old('author', $book->author ?? '') }}">
    @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="publisher" class="form-label">Penerbit</label>
    <input type="text" name="publisher" id="publisher"
           class="form-control @error('publisher') is-invalid @enderror"
           value="{{ old('publisher', $book->publisher ?? '') }}">
    @error('publisher')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="year" class="form-label">Tahun Terbit</label>
        <input type="number" name="year" id="year"
               class="form-control @error('year') is-invalid @enderror"
               value="{{ old('year', $book->year ?? '') }}">
        @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" name="stock" id="stock" min="0"
               class="form-control @error('stock') is-invalid @enderror"
               value="{{ old('stock', $book->stock ?? 0) }}">
        @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="mb-4">
    <label for="category_id" class="form-label">Kategori</label>
    <select name="category_id" id="category_id"
            class="form-select @error('category_id') is-invalid @enderror">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @selected(old('category_id', $book->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>