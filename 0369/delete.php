<?php require_once("auth.php");
require_once("config.php");

$id=$_POST['string'];
$sql = "DELETE FROM calendar_events WHERE id='$id'";

if ($mysqli->query($sql) === TRUE) 
{
    echo "<p class='btn btn-info' align='center'>Record deleted successfully</p>";
} 
else 
{
    echo "Error deleting record: " . $mysqli->error;
} 
?>