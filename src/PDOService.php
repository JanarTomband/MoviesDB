<?php

class PDOService implements IServiceDB //those functions work with all types of codes
{	//basicly those functions are the same that we saw in MySQLiService.php
	private $connectDB;
	
	public function connect() {	 //this function connects us to the database
        try {
            $this->connectDB = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";charset=".DB_CHARSET, 
                                DB_USERNAME, DB_PASSWORD);
        }		
		catch (PDOException $ex) {//if error appears this will run
			printf("Connection failed: %s", $ex->getMessage()); // in case if connection fails this shows up
			exit();//exiting the connection part after the error
		}
		return true;//runs normally if true
	}
	
	public function getAllFilms()//Gets all the Films from the database
	{	
		$films=array();//declears that films are in array
		if ($this->connect()) {//starts if we are connected to DataBase
			if ($result = $this->connectDB->query('SELECT * FROM film')) {// Selects data from database film table
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);//shows the result of or search and puts it not rows
                foreach($rows as $row){
					$films[]=new Film($row['film_id'], $row['title'], $row['description'], 
										$row['release_year'], $row['language_id'], $row=['length']);//creates an array with 5 different colums
                 } 
			}
		}
        $this->connectDB=null;//closes connection to the database
		return $films;
	}

	public function getFilmsByActor($id)
{
	$film=array();
	if ($this->connect()) {
		if ($result = $this->connectDB->prepare('SELECT film.* FROM `film` JOIN `film_actor` ON film.film_id=film_actor.film_id WHERE film_actor.actor_id=:id')) {
			$result->execute(array('id'=>$id));
			$rows = $result->fetchAll(PDO::FETCH_ASSOC);
			foreach($rows as $row){
					$film[]=new Film($row['film_id'], $row['title'], $row['description'], $row['release_year'], $row['length']);
			} 
		}
	}
	$this->connectDB=null;
	return $film; 
}

public function getFilmsByCategory($id)
{
	$film=array();
	if ($this->connect()) {
		if ($result = $this->connectDB->prepare('SELECT film.* FROM `film` JOIN `film_category` ON film.film_id=film_category.film_id WHERE film_category.category_id=:id')) {
			$result->execute(array('id'=>$id));
			$rows = $result->fetchAll(PDO::FETCH_ASSOC);
			foreach($rows as $row){
					$film[]=new Film($row['film_id'], $row['title'], $row['description'], $row['release_year'], $row['length']);
			} 
		}
	}
	$this->connectDB=null;
	return $film; 
}

	public function getAllCategories()
	{
		$categories=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM category')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
				foreach($rows as $row){
						$categories[]=new Category($row['category_id'], $row['name']);
				} 
			}
		}
		$this->connectDB=null;
		return $categories; 
	}

	public function getAllActors()
	{
		$actors=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM actor ORDER BY lastname ASC')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
				foreach($rows as $row){
						$actors[]=new Actor($row['actor_id'], $row['firstname'], $row['lastname']);
				} 
			}
		}
		$this->connectDB=null;
		return $actors; 
	}
	
	public function getFilmByID($id)//Gets all the movies by their IDs
	{	
		$film=null;
		if ($this->connect()) { //works after we are connected to the database
			if ($result = $this->connectDB->prepare('SELECT * FROM film WHERE film_id=:id')) {// uses views to select data from Film where is unknown because we need to enter id
				$result->execute(array('id'=>$id));
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
				
				$numRows = $result->rowCount();//this part counts rows
				if ($numRows==1) {//runs if number of rows equals 1
					$row=$result->fetch(); //sets how we will get our result
					$film=new Film($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);//creates array using only the parts that are shown by numbers
				}
			}
		}
        $this->connectDB=null;//closes connection to the database
	    return $film;	
	}

    public function getAllFilmsInfo()//This method gets all Films Info
	{
		$films=array();//creates an array
		if ($this->connect()) {//works after we are connected to the datbase
			if ($result = $this->connectDB->query('SELECT * FROM film_info')) {//selects data form table film_info in our SQL database
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);//result data is divided into rows
                foreach($rows as $row){
					$actors=array();//creates array for actors
					foreach (explode(";",$row['actors']) as $item) {//explodes our string into more strings and divides by semicoma
					   $actor=explode(",",$item);//Explodes the actors and divides them by coma
					   $actors[]=new Actor($actor[0], $actor[1],$actor[2]);
					}
					$categories=array(); //creates array for categories
					foreach (explode(";",$row['categories']) as $item) { //explodes our string into more strings and divides by semicoma
					   $category=explode(",",$item);//Explodes the categories and divides them by coma
					   $categories[]=new Category($category[0], $category[1]);
					}
					$item=explode(',',$row['language']);//Explodes the languages and divides them by coma
					$language=new Language($item[0], $item[1]);
					$films[]=new FilmInfo($row['id'], $row['title'], $row['description'], 
										$row['year'],  $row=['length'], $actors, $categories, $language);//this shows how will be the data displayed					
                 } 				
			}
		    $this->connectDB=null;//closes connection to the database
		}
		return $films;
	}

}

