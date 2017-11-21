<?php

class MySQLiService implements IServiceDB //those funktions work only with MySQL server
{	
	private $connectDB; //here are functions for SQL services, connect to the database, get all Films, get Films by their ID and get all films info
	//-> means that we are starting a method
	public function connect() {	//this part connects us to the SQL database and only then starts its work
		$this->connectDB = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE); 
		$this->connectDB->set_charset(DB_CHARSET); //sets characters from settings in this case utf8
		if (mysqli_connect_errno()) { //if error appears this will run
			printf("Connection failed: %s", mysqli_connect_error());// in case if connection fails this shows up
			exit(); //exiting the connection part after the error
		}
		return true; //runs normally if true
	}
	
	public function getAllFilms() //gets all the Films that are in database
	{	
		$films=array(); //declears that films are in array
		if ($this->connect()) { //starts if we are connected to DataBase
			if ($result = mysqli_query($this->connectDB, 'SELECT * FROM film')) { // Selects data from database film table
				while ($row = mysqli_fetch_assoc($result)) {  //shows the result of or search and puts it nto rows
					$films[]=new Film($row['film_id'], $row['title'], $row['description'], //creates an array with 5 different colums
										$row['release_year'],  $row=['length']);
                 } 
				 mysqli_free_result($result); //clears searched data to free more memeory
			}
		    mysqli_close($this->connectDB);	//closes connection to the database
		}
		return $films; 
	}

	public function getAllCategories()
	{
		$categories=array();
		if ($this->connect()) {
			if ($result = mysqli_query($this->connectDB, 'SELECT * FROM category')) {
				while ($row = mysqli_fetch_assoc($result)) {
						$categories[]=new Category($row['category_id'], $row['name']);
				} 
				mysqli_free_result($result);
			}
			mysqli_close($this->connectDB);	
		}
		return $categories; 
	}



	public function getFilmByID($id) //Gets all the movies by their IDs
	{	
		$film=null; 
		if ($this->connect()) { //works after we are connected to the database 
			if ($query = mysqli_prepare($this->connectDB, 'SELECT * FROM film WHERE film_id=?')) { // uses views to select data from Film where is unknown because we need to enter id
				$query->bind_param("i", $id); //"i" - $id is integer
				$query->execute(); //executes our search with parameter i as id
				$result = $query->get_result(); //gets result of our search by id
				$numRows = $result->num_rows; //counts the number of rows
				if ($numRows==1) { //runs if number of rows equals 1
					$row=$result->fetch_array(MYSQLI_NUM); //sets how we will get our result in this case as an array
					$film=new Film($row[0], $row[1], $row[2], $row[3], $row[5]); //creates array using only the parts that are shown by numbers
				}
				$query->close(); //closes the query
			}
		    mysqli_close($this->connectDB);	//closes connection to the database
		}
	    return $film;	
	}

	public function getAllFilmsInfo() //This method gets all Films Info
	{
		$films=array(); //creates an array
		if ($this->connect()) {//works after we are connected to the datbase
			if ($result = mysqli_query($this->connectDB, 'SELECT * FROM film_info')) { //selects data form table film_info in our SQL database
				while ($row = mysqli_fetch_assoc($result)) { //result data is divided into rows
					$actors=array(); //creates array for actors
					foreach (explode(";",$row['actors']) as $item) { //explodes our string into more strings and divides by semicoma
					   $actor=explode(",",$item); //Explodes the actors and divides them by coma
					   $actors[]=new Actor($actor[0], $actor[1],$actor[2]);
					}
					$categories=array(); //creates array for categories
					foreach (explode(";",$row['categories']) as $item) { //explodes our string into more strings and divides by semicoma
					   $category=explode(",",$item); //Explodes the categories and divides them by coma
					   $categories[]=new Category($category[0], $category[1]);
					}
					$item=explode(',',$row['language']); //Explodes the languages and divides them by coma
					$language=new Language($item[0], $item[1]); 
					$films[]=new FilmInfo($row['id'], $row['title'], $row['description'], 
										$row['year'],  $row=['length'], $actors, $categories, $language); //this shows how will be the data displayed
					
                 } 
				 mysqli_free_result($result); //clears searched data to free more memeory
			}
		    mysqli_close($this->connectDB);	//closes connection to the database
		}
		return $films;
	}

}

