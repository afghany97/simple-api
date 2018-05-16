<?php
/**
 * Created by PhpStorm.
 * User: Afghany
 * Date: 16/05/2018
 * Time: 06:21 م
 */

namespace App\converters;


class CategoriesConverter extends converter
{

    public function convert($object)
    {
        return [
          'name' => $object['name']
        ];
    }
}