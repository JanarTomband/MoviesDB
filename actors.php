<?php
require_once "autoloader.php"; //connectautoloader.php file here
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="C:\xampp\htdocs\03_Example_Database\CSS" type="text/css">
        <title>Actors</title>
    </head>

	<body style="background-color: #333;">

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
			
            <div class="container" style=" padding-top: 50px; padding-bottom: 100px">
			
            <div class="row">
			<div class="col-md-4">
						<div class="jumbotron w-300 p-3 text-center" style=" background-color: rgba(0,0,0,.55);color: #999; padding-left: 20px; word-wrap: break-word;">
							<h1  style="color: #336E7B">Welcome</h1>
							<div class="col-md-50" style=" padding-top: 30px"> 
									<a class="btn" href="index.php"  role="button" style="background-color:#154360 ;color: #D4E6F1; padding-left: 32px; padding-right: 32px" />Menu</a>
									<div  style=" padding-top: 20px">
									<a class="btn" href="Categories.php"  role="button" style="background-color:#154360 ;color: #D4E6F1; padding-left: 15px; padding-right: 15px" />Categories</a>
                                    <div  style=" padding-bottom: 100px">
                                </form>    
							</div>
							</div>
                            </div>
						</div>
					</div>
            
            <div class="col-8">
            <div class="jumbotron w-300 p-3 text-center" style=" background-color: rgba(0,0,0,.55);color: #999; padding-left: 300px; word-wrap: break-word;">

           
            
                <?php
                $growingId=1;
                $db=new PDOService(); 
                
               
                 foreach($db->getAllActors() as $actors) { ?>
                <div class="dropdown" style="padding-top: 10px;">
                <button class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" button:focus="outline:0" aria-expanded="false " style=" min-width: 250px; max-width: 250px; background-color:#154360 ;color: #D4E6F1;padding-left: 15px; padding-right: 15px"> <?php
                 echo $growingId++.". ".$actors->firstname."   ".$actors->lastname ?> </button> <?php "<br/>";
               }
            ?>
            
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">
            <?php
            $db=new PDOService(); 
            foreach($db->getFilmsByActor() as $film) {
               echo $film->id.". ". $film->title."<br/>";
                }
            ?></a>
                </div>
              </div>
						</div>

					<footer style="padding-top: 200px"><div class="fixed-bottom p-2 text-white text-center color " style=" background-color:#154360">Janar Tomband <?php echo date("Y"); ?></div></footer>
					<div class="col">
	
					</div>
				</div>
    </body>
</html>