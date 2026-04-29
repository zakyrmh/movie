<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Models\Category;
use App\Interfaces\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAllPaginated($search = null)
    {
        $query = Movie::latest();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('sinopsis', 'like', '%' . $search . '%');
        }

        return $query->paginate(6)->withQueryString();
    }

    public function findById($id)
    {
        return Movie::findOrFail($id);
    }

    public function getAllCategories()
    {
        return Category::all();
    }

    public function create(array $data)
    {
        return Movie::create($data);
    }

    public function update($id, array $data)
    {
        $movie = $this->findById($id);
        $movie->update($data);
        return $movie;
    }

    public function delete($id)
    {
        $movie = $this->findById($id);
        return $movie->delete();
    }
}
