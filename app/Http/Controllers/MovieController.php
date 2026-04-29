<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * @var \App\Services\MovieService
     */
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index(Request $request)
    {
        $movies = $this->movieService->getHomepageMovies($request->search);
        return view('homepage', compact('movies'));
    }

    public function detail($id)
    {
        $movie = $this->movieService->getMovieById($id);
        return view('detail', compact('movie'));
    }

    public function create()
    {
        $categories = $this->movieService->getAllCategories();
        return view('input', compact('categories'));
    }

    public function store(StoreMovieRequest $request)
    {
        // Controller hanya melempar data valid dan file ke service
        $this->movieService->storeMovie($request->validated(), $request->file('foto_sampul'));
        return redirect('/')->with('success', 'Film berhasil ditambahkan.');
    }

    public function data()
    {
        $movies = $this->movieService->getMoviesForData();
        return view('data-movies', compact('movies'));
    }

    public function edit($id)
    {
        $movie = $this->movieService->getMovieById($id);
        $categories = $this->movieService->getAllCategories();
        return view('form-edit', compact('movie', 'categories'));
    }

    public function update(UpdateMovieRequest $request, $id)
    {
        $this->movieService->updateMovie(
            $id,
            $request->validated(), // Langsung ambil data yang valid
            $request->file('foto_sampul')
        );

        return redirect('/movies/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->movieService->deleteMovie($id);
        return redirect('/movies/data')->with('success', 'Data berhasil dihapus');
    }
}
