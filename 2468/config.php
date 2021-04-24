<?php

/* Attempt to connect to MySQL database */
$mysqli = mysqli_connect("localhost", "root", '', "collection");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>