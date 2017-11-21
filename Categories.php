<?php
require_once "autoloader.php"; //connectautoloader.php file here
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="C:\xampp\htdocs\03_Example_Database\CSS" type="text/css">
        <title>Categories</title>
    </head>

	<body style="background-color: #333;">
			<div class="container" style=" padding-top: 50px">
			
            <div class="row">
			<div class="col-md-4">
						<div class="jumbotron w-300 p-3 text-center" style=" background-color: rgba(0,0,0,.55);color: #999; padding-left: 20px; word-wrap: break-word;">
							<h1  style="color: #336E7B">Welcome</h1>
							<div class="col-md-50 text-center" style=" padding-top: 30px"> 
									<a class="btn" href="index.php"  role="button" style="background-color:#154360 ;color: #D4E6F1; padding-left: 32px; padding-right: 32px" />Menu</a>
									<div  style=" padding-top: 20px">
									<a class="btn" href="Actors.php"  role="button" style="background-color:#154360 ;color: #D4E6F1; padding-left: 30px; padding-right: 30px" />Actors</a>
                                    <div  style=" padding-bottom: 100px">
								</form>    
							</div>
                            </div>
							</div>
						</div>
					</div>
            
            <div class="col-8">
            <div class="jumbotron w-300" style=" background-color: rgba(0,0,0,.55);color: #999; padding-left: 300px; word-wrap: break-word;">

                <?php
                $db=new PDOService();
                 foreach($db->getAllCategories() as $categories) {
                 echo $categories->id.". ". $categories->name."<br/>";
                 }
            ?>

              </div>
						</div>

					<footer style="padding-top: 200px"><div class="fixed-bottom p-2 text-white text-center color " style="background-color:#154360">Janar Tomband <?php echo date("Y"); ?></div></footer>
					<div class="col">
	
					</div>
				</div>
    </body>
</html>