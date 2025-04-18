@extends('layouts.master')

@section('title')
    Halaman Utama
@endsection

@section('content')
<div class="container my-5">

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
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0 text-center fw-bold">Selamat Datang di Halaman Utama</h4>
        </div>
        
        <div class="card-body px-5 py-4">
            <h2 class="text-center mb-2 text-primary fw-bold">Halo, {{ auth()->user()->name }}!</h2>

            <p class="lead text-center">Selamat datang kembali di sistem kami. Kamu telah berhasil login dan bisa mengakses berbagai fitur di platform ini.</p>

            <div class="text-center">
                <a href="/profile" class="btn btn-primary btn-lg px-4 rounded-pill shadow-sm">
                    Profil Saya
                </a>
                <a href="/book" class="btn btn-outline-primary btn-lg px-4 rounded-pill shadow-sm">
                    Lihat Buku
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
