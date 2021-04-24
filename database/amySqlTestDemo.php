<?php
//tries to get the database once
require_once("adbDemo.php");
//grabs the databse info and stores it into results
$results = $db->query("SELECT * FROM 'test'");
$item = array();
print_r($results);
//fetches whats in results stores it as an array in item
while($obj = $results->fetch_object()) $item[]= $obj;
//recursivly prints item
print_r($item);
?>