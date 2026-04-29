<?php

namespace App\Services;

use App\Interfaces\MovieRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MovieService
{
    protected $movieRepo;

    public function __construct(MovieRepositoryInterface $movieRepo)
    {
        $this->movieRepo = $movieRepo;
    }

    public function getHomepageMovies($search = null)
    {
        return $this->movieRepo->getAllPaginated($search);
    }

    public function getMovieById($id)
    {
        return $this->movieRepo->findById($id);
    }

    public function getAllCategories()
    {
        return $this->movieRepo->getAllCategories();
    }

    public function getMoviesForData()
    {
        return $this->movieRepo->getAllPaginated();
    }

    public function storeMovie(array $data, $file = null)
    {
        if ($file) {
            $data['foto_sampul'] = $this->handleImageUpload($file);
        }

        return $this->movieRepo->create($data);
    }

    public function updateMovie($id, array $data, $file = null)
    {
        $movie = $this->movieRepo->findById($id);

        if ($file) {
            $this->deleteImage($movie->foto_sampul);
            $data['foto_sampul'] = $this->handleImageUpload($file);
        }

        return $this->movieRepo->update($id, $data);
    }

    public function deleteMovie($id)
    {
        $movie = $this->movieRepo->findById($id);

        $this->deleteImage($movie->foto_sampul);

        return $this->movieRepo->delete($id);
    }

    /**
     * Handle proses upload gambar dan generate nama acak
     */
    private function handleImageUpload($file)
    {
        $fileName = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $fileName);

        return $fileName;
    }

    /**
     * Handle proses hapus gambar dari folder
     */
    private function deleteImage($fileName)
    {
        if ($fileName) {
            $imagePath = public_path('images/' . $fileName);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
    }
}
