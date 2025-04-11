@extends('layouts.master')
@section('title')
Detail Genre
@endsection
@section('content')
<h1>{{$genres->name}}</h1>
<p>{{$genres->description}}</p>
<a href="/genre" type="button" class="btn btn-primary" >KEMBALI</a>


  @endsection