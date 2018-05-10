<?php

namespace App\converters;

abstract class converter{

    abstract public function convert($object);

    public function convertCollections(array $objects){

        return array_map(function ($object){
            return $this->convert($object);
        },$objects);
    }


}