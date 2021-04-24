<?php require_once("auth.php");
require_once("config.php");

$page = $_SERVER['PHP_SELF'];
$string  = $_POST['string'];
$eventname  = $_POST['eventname'];
$eventdesc  = $_POST['eventdesc'];
$eventcat  = $_POST['eventcat'];
$eventdate  = $_POST['eventdate'];

if ($eventname=='')
{
    echo "<p class='btn btn-info'>Please enter event name</p>";
}
else
{
    $sql = "UPDATE calendar_events SET event_title='$eventname', event_shortdesc='$eventdesc', event_category='$eventcat', event_start='$eventdate' WHERE id = '$string'";
    if ($mysqli->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . $mysqli->error;
    }
}
echo "<script>window.location.reload();</script>";
die;
?>