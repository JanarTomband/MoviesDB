<?php

class Actor //This class holds everything that we need for actor
{ //later this will be conected to moviesdb_dump and will be converted to php
    public $id; //publicly available id
    public $lastname;//publicly available lastname
    public $firstname;//publicly available firstname

     public function __construct($id, $firstname, $lastname)
     {
         $this->id=$id;
         $this->firstname=$firstname;
         $this->lastname=$lastname;
     }
}