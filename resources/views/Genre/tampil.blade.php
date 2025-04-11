@extends('layouts.master')
@section('title')
Genre
@endsection
@section('content')
<a href="/genre/create" type="button" class="btn btn-success" >TAMBAH GENRE</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Genre name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($genres as $item)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->name}}</td>
            <td>
              <form method="POST" action="/genre/{{$item->id}}">
              <a type="button" class="btn btn-primary btn-sm" href="/genre/{{$item->id}}">DETAIL</a>
              <a type="button" class="btn btn-warning btn-sm" href="/genre/{{$item->id}}/edit">EDIT</a>
                @csrf
                @method('DELETE')
              <input type="submit" value="DELETE" class="btn btn-danger btn-sm ">
              </form>
            </td>
          </tr>
        @empty
            
        @endforelse
     
      
    </tbody>
  </table>

  @endsection