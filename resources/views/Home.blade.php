@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="container pt-2">
    <!-- Alert Success -->
    @if (session('Success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert" style="border-radius: 8px; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 10px 15px;">
        <i class="bi bi-check-circle-fill fs-5 text-success"></i>
        <div class="flex-grow-1">{{ session('Success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #155724; font-size: 20px;"></button>
    </div>
    @endif

    <!-- Alert Danger -->
    @if (session('danger'))
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2" role="alert" style="border-radius: 8px; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px 15px;">
        <i class="bi bi-x-circle-fill fs-5 text-danger"></i>
        <div class="flex-grow-1">{{ session('danger') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #721c24; font-size: 20px;"></button>
    </div>
    @endif
</div>

<!-- Hero Section -->
<section class="jumbotron text-center" style="background-color: #e3f2fd; padding: 70px 0;">
    <div class="container">
        @auth
        <h1 class="display-4 font-weight-bold">Selamat Datang, {{ Auth::user()->name }} di Perpustakaan Digital</h1>
        @endauth
        @guest
        <h1 class="display-4 font-weight-bold">Selamat Datang di Perpustakaan Digital</h1>
        @endguest
        <p class="lead mb-4">Akses ribuan buku dari berbagai genre secara online dan mudah.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="/book" class="btn btn-primary btn-lg m-1 shadow-lg">Mulai Membaca</a>
            <a href="/book" class="btn btn-success btn-lg m-1 shadow-lg">Jelajahi Buku</a>
            <a href="/login" class="btn btn-outline-secondary btn-lg m-1 shadow-lg">Login / Register</a>
        </div>
    </div>
</section>

<!-- Fitur Unggulan -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-weight-bold">🚀 Fitur Unggulan Kami</h2>
            <p class="text-muted">Temukan fitur-fitur inovatif yang membuat pengalaman membaca kamu lebih menyenangkan dan efisien.</p>
        </div>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body">
                        <i class="fas fa-book-reader fa-3x text-primary"></i> <!-- Ikon Buku Berwarna -->
                        <h5 class="card-title mt-3">Pengalaman Membaca Interaktif</h5>
                        <p class="text-muted">Nikmati pengalaman membaca dengan berbagai alat interaktif yang membuat bacaan lebih hidup.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body">
                        <i class="fas fa-cloud fa-3x text-success"></i> <!-- Ikon Awan Berwarna -->
                        <h5 class="card-title mt-3">Akses Mudah dari Mana Saja</h5>
                        <p class="text-muted">Akses buku favorit kamu kapan saja, di mana saja, dengan koneksi internet yang stabil.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body">
                        <i class="fas fa-bookmark fa-3x text-warning"></i> <!-- Ikon Penanda Buku Berwarna -->
                        <h5 class="card-title mt-3">Penanda Buku Canggih</h5>
                        <p class="text-muted">Lanjutkan membaca dari halaman terakhir dengan mudah menggunakan fitur penanda buku otomatis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Tentang Perpustakaan Digital -->
<section class="container pt-5">
    <div class="text-center mb-4">
        <h1 class="display-4 font-weight-bold">Perpustakaan Digital</h1>
        <h2 class="h4 text-muted">Akses Buku Online yang Mudah dan Cepat</h2>
        <p class="lead mt-3">Dapatkan ribuan buku dari berbagai genre yang bisa kamu baca kapan saja dan di mana saja!</p>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title">🎯 Manfaat Bergabung dengan Perpustakaan Digital</h3>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">✅ Akses ribuan buku gratis dan premium kapan saja</li>
                        <li class="list-group-item">✅ Baca buku favoritmu di mana saja, kapan saja</li>
                        <li class="list-group-item">✅ Fitur pencarian yang memudahkan untuk menemukan buku</li>
                        <li class="list-group-item">✅ Pembaruan koleksi buku secara rutin</li>
                    </ul>

                    <h3 class="card-title">📝 Cara Bergabung dan Mulai Membaca</h3>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Kunjungi halaman <a href="/register" class="text-primary font-weight-bold">Pendaftaran</a></li>
                        <li class="list-group-item">Daftar dengan akun email kamu</li>
                        <li class="list-group-item">Mulai membaca buku favorit kamu secara langsung!</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Informasi Perpustakaan Digital Lainnya -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-weight-bold">🔍 Fitur Pencarian Buku yang Cepat</h2>
            <p class="text-muted">Kami menyediakan fitur pencarian buku yang memudahkan kamu untuk menemukan buku sesuai dengan keinginan.</p>
        </div>
        <div class="row text-center">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="https://img.icons8.com/ios-filled/100/000000/search.png" alt="Search Books" class="card-img-top" style="max-width: 50px; margin: 0 auto;"/>
                    <div class="card-body">
                        <h5 class="card-title">Cari Buku Berdasarkan Kategori</h5>
                        <p class="text-muted">Temukan buku berdasarkan genre yang kamu minati.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="https://img.icons8.com/ios-filled/100/000000/search.png" alt="Advanced Search" class="card-img-top" style="max-width: 50px; margin: 0 auto;"/>
                    <div class="card-body">
                        <h5 class="card-title">Cari Buku Berdasarkan Kata Kunci</h5>
                        <p class="text-muted">Gunakan kata kunci untuk menemukan buku yang lebih spesifik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2 class="font-weight-bold">Yuk Mulai Petualangan Membacamu Sekarang!</h2>
        <p class="lead">Temukan buku favoritmu dan jadilah bagian dari komunitas pembaca kami.</p>
        <a href="/register" class="btn btn-light btn-lg mt-3">Daftar Sekarang</a>
    </div>
</section>

@endsection
