<!DOCTYPE html>
<html>
  <head>
    <title>Events</title>
    <link rel="stylesheet" href="../CSS/style.css">
  </head>
  <body onbeforeunload="refreshAndClose();">
    <h1 style="text-align: left;">Events</h1>
    <?php
    include_once("auth.php");
    include_once("config.php");

    //add any new event
    if ($_POST) 
    {
      //create database-safe strings
      $user = mysqli_real_escape_string($mysqli, $_SESSION['id']);
      $safe_m = mysqli_real_escape_string($mysqli, $_POST['m']);
      $safe_d = mysqli_real_escape_string($mysqli, $_POST['d']);
      $safe_y = mysqli_real_escape_string($mysqli, $_POST['y']);
      $safe_event_title = mysqli_real_escape_string($mysqli, $_POST['event_title']);
      $safe_event_shortdesc = mysqli_real_escape_string($mysqli, $_POST['event_shortdesc']);
      $safe_event_category = mysqli_real_escape_string($mysqli, $_POST['event_category']);
      $safe_event_time_hh = mysqli_real_escape_string($mysqli, $_POST['event_time_hh']);
      $safe_event_time_mm = mysqli_real_escape_string($mysqli, $_POST['event_time_mm']);
      
      $event_date = $safe_y."-".$safe_m."-".$safe_d." ".$safe_event_time_hh.":".$safe_event_time_mm.":00";
      
      $insEvent_sql = "INSERT INTO calendar_events (userid, event_title, event_shortdesc, event_category, event_start) VALUES('".$user."','".$safe_event_title."', '".$safe_event_shortdesc."', '".$safe_event_category."', '".$event_date."');";
      $insEvent_res = mysqli_query($mysqli, $insEvent_sql) or die(mysqli_error($mysqli));
    } 
    else 
    {
      //create database-safe strings
      //This gives warning if event is deleted
      $safe_m = mysqli_real_escape_string($mysqli, $_GET['m']);
      $safe_d = mysqli_real_escape_string($mysqli, $_GET['d']);
      $safe_y = mysqli_real_escape_string($mysqli, $_GET['y']);
    }
    
    //show events for this day
    $getEvent_sql = "SELECT id, event_title, event_shortdesc, event_category, date_format(event_start, '%l:%i %p') as fmt_date FROM calendar_events WHERE userid='".$_SESSION['id']."' AND month(event_start) = '".$safe_m."' AND dayofmonth(event_start) = '".$safe_d."' AND year(event_start) = '".$safe_y."' ORDER BY event_start";
    $getEvent_res = mysqli_query($mysqli, $getEvent_sql) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($getEvent_res) > 0) 
    {
      $event_txt = "<ul style=\"text-align: left;\">";
      while ($ev = @mysqli_fetch_array($getEvent_res)) 
      {
        $event_id = $ev['id'];
        $event_title = stripslashes($ev['event_title']);
        $event_shortdesc = stripslashes($ev['event_shortdesc']);
        $event_category = stripslashes($ev['event_category']);
        $fmt_date = $ev['fmt_date'];

        $event_txt .= "<li style=\"text-align: left;\"><strong>".$fmt_date."</strong>: ".$event_title."<br>".$event_category."<br>".$event_shortdesc."</li><form method=\"post\" action=\"removeEvent.php\"><input type=\"hidden\" name=\"evid\" value=\"$event_id\"><button type=\"submit\" name=\"delete\">Delete Event</button></form>";
      }
      $event_txt .= "</ul>";
      mysqli_free_result($getEvent_res);
    }
    else 
    {
      $event_txt = "";
    }

    // close connection to MySQL
    mysqli_close($mysqli);

    if ($event_txt != "") 
    {
      echo "<p style=\"text-align: left;\"><strong>Today's Events:</strong></p>$event_txt<hr>";
    }

    // show form for adding an event
    echo <<<END_OF_TEXT
      <h1 style="text-align: left;">Create New Event</h1>
      <form style="text-align: left;" method="post" action="$_SERVER[PHP_SELF]">
        <p style="text-align: left;">Enter event information below and click "Add Event" to add the event and refresh this window.</p>

        <p style="text-align: left;"><label for="event_title">Event Title:</label><br>
        <input type="text" id="event_title" name="event_title" size="25" maxlength="25"></p>

        <p style="text-align: left;"><label for="event_shortdesc">Event Description:</label><br>
        <input type="text" id="event_shortdesc" name="event_shortdesc" size="25" maxlength="255"></p>

        <p style="text-align: left;"><label for="event_category">Event Category:</label>
        <select style="text-align: left;" name="event_category">
          <option value="Birthday">Birthday</option>
          <option value="Dinner">Dinner</option>
          <option value="Meeting">Meeting</option>
          <option value="Party">Party</option>
          <option value="Social Occasion">Social Occasion</option>
          <option value="Work Event">Work Event</option>
          <option value="Vacation">Vacation</option>
          <option value="Other">Other</option>
        </select></p>
        
        <fieldset style="text-align: left;">
          <legend style="text-align: left;">Event Time (hh:mm):</legend>
          <select name="event_time_hh">
      END_OF_TEXT;

    for ($x=1; $x <= 24; $x++) 
    {
      echo "<option value=\"$x\">$x</option>";
    }

    echo <<<END_OF_TEXT
          </select> :
          <select name="event_time_mm">
            <option value="00">00</option>
            <option value="15">15</option>
            <option value="30">30</option>
            <option value="45">45</option>
          </select>
          </fieldset>
          <input type="hidden" name="m" value="$safe_m">
          <input type="hidden" name="d" value="$safe_d">
          <input type="hidden" name="y" value="$safe_y">
            
          <button type="submit" name="submit" value="submit">Add Event</button>
      </form>
      END_OF_TEXT;
    ?>
  </body>
  <script type="text/javascript">
    function refreshAndClose() 
    {
        window.opener.location.reload(true);
        window.close();
    }
  </script>
</html>