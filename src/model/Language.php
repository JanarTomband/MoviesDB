<?php

class Language //This hold data about languages that we use in movies
{//later this will be conected to moviesdb_dump and will be converted to php
    public $id;
    public $name;

     public function __construct($id, $name)
     {
         $this->id=$id;
         $this->name=$name;
     }
}