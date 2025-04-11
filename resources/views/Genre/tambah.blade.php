@extends('layouts.master')
@section('title')
Tambah Genre
@endsection
@section('content')
<form method="POST" action="/genre">
    @csrf
    @if ($errors->any())
    
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="mb-3">
      <label class="form-label">Genre Name</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
      <label  class="form-label">Genre Description</label>
      <textarea type="text" name="description" class="form-control" cols="10" rows="10" ></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection