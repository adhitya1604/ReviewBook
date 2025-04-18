@extends('layouts.master')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-info text-white rounded-top-4 px-4 py-3">
            <h4 class="mb-0 text-center fw-bold">Profil Pengguna</h4>
        </div>

        <div class="card-body px-5 py-4">
            <!-- Pesan Sukses Jika Ada -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Menampilkan Profil Pengguna -->
            <div class="mb-4">
                <label for="name" class="form-label fw-semibold">👤 Nama</label>
                <input 
                    type="text" 
                    class="form-control shadow-sm rounded-3" 
                    value="{{ Auth::user()->name }}" 
                    readonly
                >
            </div>

            <div class="mb-4">
                <label for="age" class="form-label fw-semibold">📅 Umur</label>
                <input 
                    type="number" 
                    class="form-control shadow-sm rounded-3" 
                    value="{{ $profile->age }}" 
                    readonly
                >
            </div>

            <div class="mb-4">
                <label for="address" class="form-label fw-semibold">🏡 Alamat</label>
                <input 
                    type="text" 
                    class="form-control shadow-sm rounded-3" 
                    value="{{ $profile->address }}" 
                    readonly
                >
            </div>

            <div class="d-grid">
                <a href="{{ route('profile.edit') }}" class="btn btn-warning fw-bold shadow-sm rounded-pill px-4 py-2">
                    <i class="bi bi-pencil me-1"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
