<?php 
//this line connects to your data base by putting in the following info in this order
//MySQL Hostname,MySQL Username, MySqlPassword, Your databases name
$db=mysqli_connect('sql212.epizy.com',"epiz_27689269","Nb2SxGP6UGl",'epiz_27689269_test');
//checks to see if its connectin if it doesnt then throw connect error
if(!$db) die(mysqli_connect_error());
?>