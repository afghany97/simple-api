<?php
/**
 * Created by PhpStorm.
 * User: Qazafy
 * Date: 10/05/2018
 * Time: 07:51 م
 */

namespace App\converters;


class BooksConverter extends converter
{

    public function convert($object)
    {
        return [
            'book name' => $object['name'],
            'book pages' => $object['pages'],
            'book price' => $object['price'],
            'book auther' => $object['user_id'],
            'book category' => $object['category_id']
        ];
    }

//    public function convertCollections(array $objects)
//    {
//        return array_map(function ($object){
//            return $this->convert($object);
//        },$objects);
//    }
}