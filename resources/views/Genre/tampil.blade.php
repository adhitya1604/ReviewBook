@extends('layouts.master')

@section('title')
Genre
@endsection

@section('content')
<div class="container my-5">

  @auth
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">
      <i class="bi bi-journals me-2"></i> Daftar Genre Buku
    </h2>
    <a href="/genre/create" class="btn btn-success shadow-sm rounded-pill px-4 py-2">
      <i class="bi bi-plus-circle me-2"></i>Tambah Genre
    </a>
  </div>
  @endauth

  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-body p-0">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-warning text-center">
          <tr>
            <th scope="col">#</th>
            <th scope="col"><i class="bi bi-masks me-1"></i>Nama Genre</th>
            <th scope="col"><i class="bi bi-gear-fill me-1"></i>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($genres as $item)
          <tr>
            <td class="text-center fw-semibold">{{ $loop->iteration }}</td>
            <td class="text-capitalize text-center">{{ $item->name }}</td>
            <td class="text-center">
              <div class="btn-group" role="group">
                <a href="/genre/{{ $item->id }}" type="button" class="btn btn-sm btn-info text-white shadow-sm rounded-pill" title="Lihat Detail">
                  <i class="bi bi-eye-fill me-1"></i>DETAIL
                </a>
                @auth
                <a href="/genre/{{ $item->id }}/edit" class="btn btn-sm btn-warning text-white shadow-sm rounded-pill" title="Edit Genre">
                  <i class="bi bi-pencil-fill me-1"></i>EDIT
                </a>
                <form method="POST" action="/genre/{{ $item->id }}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger shadow-sm rounded-pill" title="Hapus Genre" onclick="return confirm('Yakin ingin menghapus genre ini?')">
                    <i class="bi bi-trash-fill me-1"></i>DELETE
                  </button>
                </form>
                @endauth
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3" class="text-center text-muted py-5">
              <i class="bi bi-emoji-frown-fill me-2"></i>Belum ada genre yang tersedia.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
