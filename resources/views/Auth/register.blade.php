@extends('layouts.master')

@section('title', 'Register')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header text-white text-center" style="background: linear-gradient(90deg, #ff512f, #dd2476);">
            <h4 class="mb-0">Register</h4>
        </div>
        
        
        
        <div class="card-body px-4 py-5">

            <form method="POST" action="/register">
                @csrf

                {{-- Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">
                        <i class="bi bi-person-check-fill"></i> Register
                    </button>
                </div>
            </form>

            <p class="mt-4 text-center">
                Already have an account? <a href="/login" class="text-primary">Login</a>
            </p>
        </div>
    </div>
</div>
@endsection
