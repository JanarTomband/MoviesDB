<?php

class FilmInfo extends Film //this class holds everything that we need to know about filminformation and its extended to Film so it gets some of data from there as well
{//later this will be conected to moviesdb_dump and will be converted to php
    public $actors=array();
    public $categories=array();
    public $language;

    public function __construct($id, $title, $description, $releaseYear, $length, $actors, $categories, $language)
    {
        parent::__construct($id, $title, $description, $releaseYear, $length); //shows data from Film
        $this->actors=$actors;
        $this->categories=$categories;
        $this->language=$language;
    }
}

