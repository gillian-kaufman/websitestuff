<?php include_once("auth.php");
include_once("config.php");

$sql="DELETE FROM calendar_events WHERE userid=? AND id=?";

$stmt=$mysqli->prepare($sql);
$stmt->bind_param("is",$_SESSION['id'],$_POST['evid']);

if($stmt->execute())
{
    $_SESSION['removeEvent'] = array("success"=>true,"message"=>"Event Removed From Your List");
}
else
{
    $_SESSION['removeEvent'] = array("success"=>false,"message"=>"Event Was Not Removed From Your List");
}
echo "<script>function refreshAndClose() 
{
    window.opener.location.reload(true);
    window.close();
}
refreshAndClose();
window.close();</script>";
die;
?>