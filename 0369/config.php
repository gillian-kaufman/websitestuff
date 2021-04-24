<?php

/* Attempt to connect to MySQL database */
$mysqli = mysqli_connect("sql212.epizy.com", "epiz_27689269", "Nb2SxGP6UGl", "epiz_27689269_test");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>