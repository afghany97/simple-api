<?php

namespace App\Http\Controllers;

use App\book;
use App\converters\BooksConverter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BooksController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth.basic')->only('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @param BooksConverter $converter
     * @return \Illuminate\Http\Response
     */
    public function index(BooksConverter $converter)
    {
        $books = book::all()->toArray();

        return $this->successfulResponse($converter->convertCollections($books));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try{
            $this->validate(request(), [
                'name' => 'required|string',
                'price' => 'required|numeric',
                'pages' => 'required|numeric'
            ]);
        }catch (ValidationException $exception){

            return $this->invalidPassedParams();
        }

        Book::addBook();

        return $this->createdSuccessfully();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @param BooksConverter $converter
     * @return array
     */
    public function show($id, BooksConverter $converter)
    {
        try {

            $book = Book::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return $this->NotFound('object not found.!');
        }

        return $this->successfulResponse($converter->convert($book));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
