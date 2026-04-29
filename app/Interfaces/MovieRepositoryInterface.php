<?php

namespace App\Interfaces;

interface MovieRepositoryInterface
{
    public function getAllPaginated($search = null);
    public function findById($id);
    public function getAllCategories();
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
