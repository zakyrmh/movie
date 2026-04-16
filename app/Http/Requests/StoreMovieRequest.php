<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'judul'       => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'sinopsis'    => 'required|string',
            'tahun'       => 'required|integer|min:1900|max:2030',
            'pemain'      => 'required|string|max:255',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
