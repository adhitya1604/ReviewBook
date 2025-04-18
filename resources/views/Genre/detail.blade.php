@extends('layouts.master')

@section('title')
Detail Genre
@endsection

@section('content')
<div class="container mt-5 mb-4">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-info text-white text-center rounded-top-4">
      <h4 class="mb-0 fw-bold">Detail Genre</h4>
    </div>
    <div class="card-body px-5 py-4">

      <h2 class="text-center mb-4 text-primary fw-bold">{{ $genres->name }}</h2>
      <p class="text-muted text-center mb-4">{{ $genres->description }}</p>

      <div class="d-flex justify-content-center mt-4">
        <a href="/genre" type="button" class="btn btn-outline-primary btn-lg rounded-pill px-5 py-3 shadow-sm">
          <i class="bi bi-arrow-left-circle me-2"></i>Kembali
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
