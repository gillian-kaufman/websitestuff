<?php include_once("auth.php");
include_once("config.php");

$selectstmt="SELECT 'id' FROM calendar_events WHERE userid=? AND event_title=?";
$stmt=$mysqli->prepare($selectstmt);
$stmt->bind_param("is",$_SESSION['id'],$_POST['event']);
$stmt->execute();
$s = $stmt->fetch();
$res = $mysqli->query($stmt);
foreach ($res as $row)
{
    echo "".$row['id'];
}
if($stmt->execute())
{
    $sql="DELETE FROM calendar_events WHERE userid={$_SESSION['id']} AND id={$selectstmt}";
    
    //$sqlstmt=$mysqli->prepare($sql);
    //$sqlstmt->bind_param("is",$_SESSION['id'],$selectstmt);
    $sqlstmt = mysqli_query($mysqli, $sql);
    if($sqlstmt === TRUE)
    {
        echo "Event has been removed.";
    }
    else
    {
        echo "Error removing event.";
    }
    //header("Location: eventlist.php");
    //die;
}
else
{
    die;
}
?>