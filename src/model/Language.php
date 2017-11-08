<?php

class Language //This hold data about languages that we use in movies
{
    public $id;
    public $name;

     public function __construct($id, $name)
     {
         $this->id=$id;
         $this->name=$name;
     }
}