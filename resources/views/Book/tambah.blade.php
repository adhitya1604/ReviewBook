@extends('layouts.master')

@section('title')
Tambah BOOK
@endsection

@section('content')
<div class="container my-5">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header text-white text-center" style="background: linear-gradient(90deg, #00c6ff, #0072ff); border-top-left-radius: 0.25rem; border-top-right-radius: 0.25rem;">
      <h4 class="mb-0 fw-bold">📚 Tambah Buku Baru</h4>
    </div>
    
    <div class="card-body px-5 py-4">

      {{-- Alert Error --}}
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

      {{-- Form Tambah Buku --}}
      <form method="POST" action="/book" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label class="form-label fw-semibold">📖 Judul Buku</label>
          <input type="text" name="title" class="form-control rounded-3 shadow-sm" placeholder="Masukkan judul buku" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">📝 Ringkasan Buku</label>
          <textarea name="summary" class="form-control rounded-3 shadow-sm" rows="3"  placeholder="Deskripsi singkat buku" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">🖼️ Gambar Buku</label>
          <input type="file" name="image" class="form-control rounded-3 shadow-sm" accept="image/*" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">🎭 Genre Buku</label>
          <select class="form-control rounded-3 shadow-sm" name="genre_id" required>
            <option selected disabled>-- Pilih Genre --</option>
            @forelse ($genres as $i)
              <option value="{{ $i->id }}">{{ $i->name }}</option>
            @empty
              <option disabled>Tidak ada genre tersedia</option>
            @endforelse
          </select>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">📦 Stok Buku</label>
          <input type="number" name="stok" class="form-control rounded-3 shadow-sm" placeholder="Jumlah stok" required min="1">
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success btn-lg rounded-pill px-4 shadow-lg">
            <i class="bi bi-save me-2"></i>Simpan Buku
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
