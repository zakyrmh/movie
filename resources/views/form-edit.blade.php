@extends('layout.template')
@section('title', 'Edit Data Movie')
@section('content')
    <h2 class="mb-4 mt-4">Edit Movie</h2>

    <form action="{{ route('movies.update', ['movie' => $movie->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- Panggil form input yang sama persis --}}
        @include('partials._form')
    </form>
@endsection
