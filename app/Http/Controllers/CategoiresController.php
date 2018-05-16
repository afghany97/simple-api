<?php

namespace App\Http\Controllers;


use App\Category;
use App\converters\CategoriesConverter;

class CategoiresController extends ApiController
{
    public function index(CategoriesConverter $converter)
    {
        $categories = Category::all()->toArray();

        return $this->successfulResponse($converter->convertCollections($categories));

    }
}
