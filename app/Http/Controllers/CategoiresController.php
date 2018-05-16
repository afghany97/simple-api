<?php

namespace App\Http\Controllers;


use App\Book;
use App\Category;
use App\converters\CategoriesConverter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoiresController extends ApiController
{
    /**
     * @var CategoriesConverter
     */
    private $converter;

    /**
     * CategoiresController constructor.
     */
    public function __construct(CategoriesConverter $converter)
    {
        $this->converter = $converter;
    }

    public function index($id = null)
    {
        $categories = $id ? collect(Book::find($id)->categories)->toArray() : Category::all()->toArray();

        return $this->successfulResponse($this->converter->convertCollections($categories));

    }

    public function show($id)
    {
        try {

            $category = Category::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return $this->NotFound('object not found.!');
        }

        return $this->successfulResponse($this->converter->convert($category));

    }
}
