@extends('layouts.master')

@section('title', 'Tambah Profil')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-info text-white rounded-top-4 px-4 py-3">
            <h4 class="mb-0 text-center fw-bold">Tambah Profil Pengguna</h4>
        </div>

        <div class="card-body px-5 py-4">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('profile.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="age" class="form-label fw-semibold">📅 Umur</label>
                    <input 
                        type="number" 
                        name="age" 
                        class="form-control shadow-sm rounded-3" 
                        placeholder="Masukkan umur" 
                        required
                    >
                </div>

                <div class="mb-4">
                    <label for="address" class="form-label fw-semibold">🏡 Alamat</label>
                    <input 
                        type="text" 
                        name="address" 
                        class="form-control shadow-sm rounded-3" 
                        placeholder="Masukkan alamat" 
                        required
                    >
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success fw-bold shadow-sm rounded-pill px-4 py-2">
                        <i class="bi bi-save me-1"></i> Simpan Profil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
