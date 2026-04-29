<div class="mb-3">
    <label for="id" class="form-label">ID Film:</label>
    <input type="text" class="form-control" id="id" name="id" value="{{ old('id', $movie->id ?? '') }}" {{ isset($movie) ? 'disabled' : 'required' }}>
</div>
<div class="mb-3">
    <label for="judul" class="form-label">Judul:</label>
    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $movie->judul ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="category_id" class="form-label">Kategori:</label>
    <select name="category_id" id="category_id" class="form-select" required>
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ (old('category_id', $movie->category_id ?? '')) == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="sinopsis" class="form-label">Sinopsis:</label>
    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4" required>{{ old('sinopsis', $movie->sinopsis ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="tahun" class="form-label">Tahun:</label>
    <input type="number" class="form-control" id="tahun" name="tahun" value="{{ old('tahun', $movie->tahun ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="pemain" class="form-label">Pemain:</label>
    <input type="text" class="form-control" id="pemain" name="pemain" value="{{ old('pemain', $movie->pemain ?? '') }}" required>
</div>

{{-- Tampilkan foto lama HANYA saat mode Edit --}}
@if(isset($movie))
<div class="mb-3">
    <label for="foto" class="form-label">Foto Sebelumnya:</label><br>
    <img src="/images/{{ $movie->foto_sampul }}" class="img-thumbnail" alt="..." width="100px">
</div>
@endif

<div class="mb-3">
    <label for="foto_sampul" class="form-label">Foto Sampul:</label>
    {{-- Input foto required saat tambah, tapi opsional saat edit --}}
    <input type="file" class="form-control" id="foto_sampul" name="foto_sampul" {{ isset($movie) ? '' : 'required' }}>
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
