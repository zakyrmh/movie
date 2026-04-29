@extends('layout.template')
@section('title', 'Input Data Movie')
@section('content')
    <a href="/movies/data" class="btn btn-primary mt-4">List Movie</a>
    <h2 class="mb-4">Tambah Movie Baru</h2>

    <form action="/movies/store" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- Panggil form input --}}
        @include('partials._form')
    </form>
@endsection
