<?php
//Here we will download files form database
 spl_autoload_register(function($name){
    require_once('settings.php'); //Here we will run settings.php once then check for it to be included (require_once explained bellow)
    $dir=['src/','src/model/']; //array dir for searching files
    for ($i=0; $i < count($dir); $i++) { //this loop will work until it finds the files
        if(file_exists($dir[$i].$name.'.php')) { //if the file exixsts (we found it)
             require_once $dir[$i].$name.'.php';// require_once checks if the file already been included, and if so it will not include it again
         }
    }     
 });