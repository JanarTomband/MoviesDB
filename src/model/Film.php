<?php

class Film //this class holds everything that we need to know about film
{//later this will be conected to moviesdb_dump and will be converted to php
    public $id;
    public $title;
    public $description;
    public $releaseYear;
    public $length;

    public function __construct($id, $title, $description, $releaseYear, $length)
    {
        $this->id=$id;
        $this->title=$title;
        $this->description=$description;
        $this->releaseYear=$releaseYear;
        $this->length=$length;
    }

}


