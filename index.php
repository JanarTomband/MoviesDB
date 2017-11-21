<?php
require_once "autoloader.php"; //connectautoloader.php file here
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="C:\xampp\htdocs\03_Example_Database\CSS" type="text/css">
        <title></title>
    </head>
	<body style="background-color: #333;">
	
			<div class="container" style=" padding-top: 50px">
			<div class="row">
			<div class="col-md-4">
						<div class="jumbotron w-300 p-3 text-center" style=" background-color: rgba(0,0,0,.55);color: #999; padding-left: 20px; word-wrap: break-word;">
							<h1  style="color: #336E7B">Welcome</h1>
							<div class="col-md-50 text-center" style=" padding-top: 30px"> 
									<a class="btn" href="actors.php"  role="button" style="background-color:#154360 ;color: #D4E6F1; padding-left: 30px; padding-right: 30px" />Actors</a>
									<div  style=" padding-top: 20px">
									<a class="btn" href="Categories.php"  role="button" style="background-color:#154360 ;color: #D4E6F1; padding-left: 15px; padding-right: 15px" />Categories</a>
									<div  style=" padding-bottom: 100px">
								</form>    
							</div>
							</div>
							</div>
						</div>
					</div>


				
					<div class="col-md-8">
						<div class="jumbotron w-5400 p-4" style="background-color: rgba(0,0,0,.55);color: #999; word-wrap: break-word;">
							<h1  style="color: #336E7B">Ülessanne:</h1> <h2 >Maailma filmid (30 p.)</h2><br>
							1. Kommenteerige programmi kood Example. MoviesDB (15 p.)<br>							
							2. Koostage menüü - (Category) (5 p.) - lisage getAllCategories funktsioon klassi. <br>							
							3. Kuvage filmide loetelu valitud kategooria järgi (5 p.)<br>							
							4. Looge leht Näitlejad (andmed sorteeritud perekonnanime järgi kasvavas järjekorras ). Kuvage filmide loetelu  valitud näitleja järgi (5 p.)<br>
							Kasutage Front-End CSS Framework (näiteks, Bootstrap,...)<br>
						</div>
					</div>
				

					<footer style="padding-top: 200px"><div class="fixed-bottom p-2 text-white text-center color " style="background-color:#154360">Janar Tomband <?php echo date("Y"); ?></div></footer>
					<div class="col">
	
					</div>
				</div>
        <!-- <?php//this part is commented and wount work 
			///$db=new MySQLiService();
			$db=new PDOService();//running some of the functions here form PDOService
			foreach ($db->getAllFilms() as $film) {
				echo $film->id." ".$film->title."<br />";//echo prints out what we got
			}
			$film=$db->getFilmByID(3);
			if (!is_null($film)) {//if films are found
				echo "Film found: ".$film->title."<br />";//echo prints out what we got
			}
			else {//if films are not found
				echo "Not found"."<br />";
			}
			echo "<pre>";
			$films=$db->getAllFilmsInfo();
			foreach ($films as $film) {
				var_dump($film);
			}
			echo "</pre>";
        ?> -->
    </body>
</html>
