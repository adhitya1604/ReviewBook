@extends('layouts.master')

@section('title', 'Edit Profil Saya')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-info text-white rounded-top-4 px-4 py-3">
            <h4 class="mb-0 text-center fw-bold">Edit Profil Pengguna</h4>
        </div>

        <div class="card-body px-5 py-4">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="age" class="form-label fw-semibold">📅 Umur</label>
                    <input 
                        type="number" 
                        name="age" 
                        class="form-control shadow-sm rounded-3" 
                        value="{{ $profile->age }}" 
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
                        value="{{ $profile->address }}" 
                        placeholder="Masukkan alamat" 
                        required
                    >
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-warning text-white fw-bold shadow-sm rounded-pill px-4 py-2">
                        <i class="bi bi-save me-1"></i> Update Profil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
