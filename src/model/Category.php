<?php

class Category //this table holds everything we need to know about category
{//later this will be conected to moviesdb_dump and will be converted to php
    public $id;
    public $name; //all the categories

     public function __construct($id, $name)
     {
         $this->id=$id;
         $this->name=$name;
     }
}