<?php

class Film //this class holds everything that we need to know about film
{
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


