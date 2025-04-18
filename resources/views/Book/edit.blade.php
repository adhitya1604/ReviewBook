@extends('layouts.master')

@section('title')
Edit Book
@endsection

@section('content')
<div class="container my-5">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header text-white text-center" style="background: linear-gradient(90deg, #ffc107, #ff9800);">
      <h4 class="mb-0 fw-bold">✏️ Edit Buku</h4>
    </div>
    
    <div class="card-body px-5 py-4">

      {{-- Pesan Error --}}
      @if ($errors->any())
        <div class="alert alert-danger rounded-3">
          <h5><i class="bi bi-exclamation-triangle-fill me-2"></i>Ups! Ada beberapa masalah:</h5>
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Form Edit --}}
      <form method="POST" action="/book/{{$books->id}}" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="mb-3">
          <label for="title" class="form-label fw-semibold">📖 Judul Buku</label>
          <input type="text" name="title" id="title" class="form-control rounded-3 shadow-sm" value="{{$books->title}}" required>
        </div>

        <div class="mb-3">
          <label for="summary" class="form-label fw-semibold">📝 Ringkasan Buku</label>
          <textarea name="summary" id="summary" class="form-control rounded-3 shadow-sm" rows="3"  required>{{$books->summary}}</textarea>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label fw-semibold">🖼️ Gambar Buku (Opsional)</label>
          <input type="file" name="image" id="image" class="form-control rounded-3 shadow-sm" accept="image/*">
          @if($books->image)
            <small class="d-block mt-2 text-muted">Gambar saat ini:</small>
            <img src="/images/{{$books->image}}" alt="Current Image" class="img-thumbnail mt-1" style="max-height: 150px;">
          @endif
        </div>

        <div class="mb-3">
          <label for="genre_id" class="form-label fw-semibold">🎭 Genre Buku</label>
          <select name="genre_id" id="genre_id" class="form-control rounded-3 shadow-sm" required>
            <option selected disabled>-- Pilih Genre --</option>
            @foreach ($genres as $genre)
              <option value="{{ $genre->id }}" {{ $books->genre_id == $genre->id ? 'selected' : '' }}>
                {{ $genre->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-4">
          <label for="stok" class="form-label fw-semibold">📦 Stok Buku</label>
          <input type="number" name="stok" id="stok" class="form-control rounded-3 shadow-sm" value="{{$books->stok}}" required min="1">
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-warning btn-lg rounded-pill px-4 shadow-lg">
            <i class="bi bi-pencil-square me-2"></i>Simpan Perubahan
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection
