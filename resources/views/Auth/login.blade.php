@extends('layouts.master')

@section('title', 'Login')

@section('content')
<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-header text-white text-center" style="background: linear-gradient(90deg, #00b4d8, #0077b6);">
          <h4 class="mb-0">Login</h4>
      </div>
      
        <div class="card-body">
          @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif

          <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" required autofocus>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>

          <div class="mt-3 text-center">
            <p>Belum punya akun? <a href="">Daftar Sekarang</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
