@extends('layouts.master')

@section('title')
Book
@endsection

@section('content')
<div class="container mt-4">

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
  @auth
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">📚 Koleksi Buku Digital</h2>
    <a href="/book/create" class="btn btn-success shadow-sm rounded-pill px-4">
      <i class="bi bi-plus-circle"></i> Tambah Buku
    </a>
  </div>  
  @endauth

  <!-- Filter Buku -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <form method="GET" action="/book" class="d-flex gap-3">
      <!-- Filter Berdasarkan Judul -->
      <select name="sort" class="form-select">
        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>A-Z</option>
        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Z-A</option>
      </select>

      <!-- Filter Berdasarkan Genre -->
      <select name="genre" class="form-select">
        <option value="">Pilih Genre</option>
        @foreach ($genres as $genre)
          <option value="{{ $genre->id }}" {{ request('genre') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
        @endforeach
      </select>

      <button type="submit" class="btn btn-primary">Filter</button>
      
      <!-- Reset Filter -->
      <a href="/book" class="btn btn-outline-secondary">Reset</a>
    </form>
  </div>

  <!-- Daftar Buku -->
  <div class="row">
    @forelse ($books as $item)
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden">
          <img src="/images/{{$item->image}}" class="card-img-top" alt="Cover Buku" style="height: 250px; object-fit: cover; border-bottom: 4px solid #007bff;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-primary">{{ $item->title }}</h5>
            <p class="card-text text-muted" style="flex-grow: 1;">
              <i class="bi bi-book"></i> {{ Str::limit($item->summary, 100) }}
            </p>
            <div class="mt-auto">
              <a href="/book/{{$item->id}}" class="btn btn-outline-primary w-100 mb-2 rounded-pill shadow-sm">
                <i class="bi bi-book-open"></i> Baca Selengkapnya
              </a>
              @auth
              <a href="/book/{{$item->id}}/edit" class="btn btn-outline-warning w-100 mb-2 rounded-pill shadow-sm">
                <i class="bi bi-pencil-square"></i> Edit Buku
              </a>
              <form method="POST" action="/book/{{$item->id}}" onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger w-100 rounded-pill shadow-sm">
                  <i class="bi bi-trash"></i> Hapus Buku
                </button>
              </form>
              @endauth
            </div>
          </div>
        </div>
      </div>
    @empty
      <!-- Gambar Placeholder ketika buku tidak ada -->
      <div class="col-12 text-center mt-5">
        <img src="/images/empty-shelf.png" class="img-fluid mb-3" style="max-height: 200px;" alt="Empty Shelf">
        <h4 class="text-muted">Belum ada buku yang tersedia.</h4>
      </div>
    @endforelse
  </div>
</div>
@endsection
