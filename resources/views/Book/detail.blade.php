@extends('layouts.master')

@section('title')
Detail Book
@endsection

@section('content')
<div class="container my-5">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header" style="background: linear-gradient(90deg, #1e3c72, #2a5298);">
      <h4 class="mb-0 text-white text-center fw-bold">
          📖 Detail Buku
      </h4>
    </div>
  
    <div class="card-body px-5 py-4">

      <!-- Judul Buku -->
      <h2 class="text-center mb-3 text-primary fw-bold">{{ $books->title }}</h2>

      <!-- Genre Buku -->
      <h5 class="text-center text-muted mb-4 fst-italic">Genre: {{ $genres->name }}</h5>

      <!-- Gambar Buku -->
      <div class="text-center mb-4">
        <img src="/images/{{ $books->image }}" class="img-fluid rounded-3 shadow-lg" alt="{{ $books->title }}" style="max-height: 400px; object-fit: cover;">
      </div>

      <!-- Ringkasan Buku -->
      <div class="mb-4">
        <h5 class="fw-semibold text-secondary">📝 Ringkasan Buku:</h5>
        <p class="lead text-justify" style="line-height: 1.8;">{{ $books->summary }}</p>
      </div>

      <!-- Form Komentar -->
      @auth
      <div class="mb-4">
        <h5 class="fw-semibold text-secondary">💬 Tinggalkan Komentar:</h5>
        <form action="{{ route('comments.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <textarea class="form-control" name="content" rows="4" placeholder="Tulis komentar Anda..." required></textarea>
          </div>
          <input type="hidden" name="book_id" value="{{ $books->id }}">
          <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm w-100">Kirim Komentar</button>
        </form>
      </div>
      @endauth

      <!-- Tampilan Komentar -->
      <div class="mb-4">
        <h5 class="fw-semibold text-secondary">💬 Komentar:</h5>
        @foreach($comments as $comment)
        <div class="mb-4">
          <div class="d-flex align-items-center mb-2">
            <strong>{{ $comment->user_name }}</strong> 
            <small class="ms-2 text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
          </div>
          <p class="lead text-justify" style="line-height: 1.8;">{{ $comment->content }}</p>
        </div>
        @endforeach
      </div>

      <!-- Tombol Kembali -->
      <div class="text-center mt-4">
        <a href="/book" class="btn btn-outline-primary btn-lg px-4 rounded-pill shadow-sm">
          <i class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Buku
        </a>
      </div>

    </div>
  </div>
</div>
@endsection
