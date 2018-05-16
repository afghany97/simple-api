<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected  $guarded = [];

    public static function addBook()
    {
        return static::create([

            'user_id' => auth()->id(),

            'price' => request('price'),

            'pages' => request('pages'),

            'name' => request('name'),

            'category_id' => rand(1,10) // will change it later
        ]);

    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'books_categories');
    }
}
