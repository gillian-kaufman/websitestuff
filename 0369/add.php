<?php require_once("auth.php");
require_once("config.php");

$eventname  = $_POST['eventname'];
$eventdesc  = $_POST['eventdesc'];
$eventcat  = $_POST['eventcat'];
$eventdate  = $_POST['eventdate'];

if ($eventname=='')
{
    echo "<p class='btn btn-info'>Please enter event title</p>";
}
else
{ 
    $sql = "INSERT INTO calendar_events (userid, event_title, event_shortdesc, event_category, event_start)
    VALUES ('".$_SESSION['id']."','".$eventname."','".$eventdesc."','".$eventcat."','".$eventdate."')";
    if ($mysqli->query($sql) === TRUE) 
    {
        echo "<p class='btn btn-info' align='center'>New record created successfully</p>";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $mysqli->error."";
    }
} 
?>