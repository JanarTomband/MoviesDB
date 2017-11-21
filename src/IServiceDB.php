<?php
//Here we hold the names for our functions beacuse we will sue them twice in MySQLiService.php and PDOService.php
interface IServiceDB
{
    public function connect();
    public function getAllFilms();
    public function getAllActors();
    public function getAllCategories();
    public function getFilmByID($id);
    public function getAllFilmsInfo();
}