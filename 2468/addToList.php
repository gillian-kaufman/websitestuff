<?php include_once("auth.php");
include_once("config.php");

$sql="insert into `list` (`username`,`card`) values (?,?)";

$stmt=$mysqli->prepare($sql);
$stmt->bind_param("is",$_SESSION['id'],$_POST['card']);

if($stmt->execute())
{
    $_SESSION['addToList'] = array("success"=>true,"message"=>"Card Added To Your Collection");
}
else
{
    $_SESSION['addToList'] = array("success"=>false,"message"=>"Card Was Not Added To Your Collection");
}
header("Location: cardlist.php");
die;
?>