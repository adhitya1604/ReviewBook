@extends('layouts.master')

@section('title')
Tambah Genre
@endsection

@section('content')
<div class="container mt-5 mb-5">
  <div class="card-header text-white text-center" style="background: linear-gradient(135deg, #007bff, #00c6ff); border-top-left-radius: 0.25rem; border-top-right-radius: 0.25rem;">
    <h4 class="mb-0 fw-bold">
      <i class="bi bi-plus-square-dotted me-2"></i>Tambah Genre Baru
    </h4>
  </div>
  

    <div class="card-body p-4">
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Ups! Ada beberapa masalah:</strong>
          <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form method="POST" action="/genre">
        @csrf

        <div class="mb-4">
          <label class="form-label fw-semibold">📘 Nama Genre</label>
          <input 
            type="text" 
            name="name" 
            class="form-control shadow-sm rounded-3" 
            placeholder="Masukkan nama genre" 
            value="{{ old('name') }}" 
            required
          >
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">📝 Deskripsi Genre</label>
          <textarea 
            name="description" 
            class="form-control shadow-sm rounded-3" 
            rows="4" 
            placeholder="Deskripsi singkat genre" 
            required
          >{{ old('description') }}</textarea>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-success fw-bold shadow-lg rounded-pill px-4 py-2">
            <i class="bi bi-save me-1"></i> Simpan Genre
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
