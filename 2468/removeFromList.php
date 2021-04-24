<?php include_once("auth.php");
include_once("config.php");

$sql="delete from list where username=? and card=?";

$stmt=$mysqli->prepare($sql);
$stmt->bind_param("is",$_SESSION['id'],$_POST['card']);

if($stmt->execute())
{
    $_SESSION['removeFromList'] = array("success"=>true,"message"=>"Card Removed From Your Collection");
}
else
{
    $_SESSION['removeFromList'] = array("success"=>false,"message"=>"Card Was Not Removed From Your Collection");
}
header("Location: cardlist.php");
die;
?>