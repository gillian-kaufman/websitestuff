<?php
$mysqli = mysqli_connect('sql212.epizy.com',"epiz_27689269","Nb2SxGP6UGl",'epiz_27689269_test');

if (mysqli_connect_errno()) 
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Person Record Insertion Form</title>
  </head>
  <link rel="stylesheet" href="../CSS/style.css">
  <body>
	<header>
		<nav class="navi">
			<ul>
				<li class="logo"><a href="../index.html">Happy Vegan Bunny</a></li>
				<li class="links"><a href="../index.html">Home</a></li>
				<li class="links"><a href="../blog.html">Blog</a></li>
				<li class="links"><a href="../about.html">About Me</a></li>
				<li class="links"><a href="../Sort/sort.html">sort demo</a></li>
				<li class="links"><a href="../Card/cards.html">card demo</a></li>
				<li class="links"><a href="../dynamicCard/dynamiccards.html">dynamic card demo</a></li>
				<li class="links"><a href="../Prime/prime.html">Prime Numbers</a></li>
				<li class="links"><a href="../Keypress/keypress.html">keypress demo</a></li>
				<li class="links"><a href="../Audioplayer/audio.html">audio player demo</a></li>
				<li class="links"><a href="../jquerydemo.html">jquery demo</a></li>
				<li class="links"><a href="../livesearch.html">ajax live search</a></li>
				<li class="links"><a href="../collection/collection.html">collection</a></li>
				<li class="links"><a href="../4896/programtest2.php">program test 2</a></li>
				<li class="links"><a href="person.php">person record</a></li>
			</ul>
		</nav>	
	</header>
    <h1>Add Person to Records</h1>
    <form method="POST">
      <p><label for="lname">Last Name:</label><br>
      <input type="text" id="lname" name="lastname" placeholder="Enter Last Name" size="30"></p>
      <p><label for="fname">First Name:</label><br>
      <input type="text" id="fname" name="firstname" placeholder="Enter First Name" size="30"></p>
      <p><label for="email">Email Address:</label><br>
      <input type="text" id="email" name="email" placeholder="Enter Email Address" size="30"></p>
      <button type="submit" name="submit" value="insert">Insert Record</button>
      <button type="submit" name="show">Show All Records</button><br>
    </form>
    <div><br>
    <?php
    if (isset($_POST['submit'])) 
    { 
      	$lname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
	    $fname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
	    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
	    $sql = "INSERT INTO Person(lastname, firstname, email) VALUES ('".$lname."', '".$fname."', '".$email."')";
	    $res = mysqli_query($mysqli, $sql);

	    if ($res === TRUE) 
	    {
	       	echo "A record has been inserted.";
	    } 
	    else 
	    {
		    printf("Could not insert record: %s\n", mysqli_error($mysqli));
    	}

	    mysqli_close($mysqli);
    }
    if (isset($_POST['show']))
    {
      	$sql = "SELECT * FROM Person";
	    $res = mysqli_query($mysqli, $sql);

	    if ($res) 
	    {
		    while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) 
		    {
			  $lname  = $newArray['lastname'];
			  $fname = $newArray['firstname'];
			  $email = $newArray['email'];
			  echo "Last name: ".$lname." <br>First name: ".$fname."<br>Email: ".$email."<br><br>";
	   	  }
	    } 
	    else 
	    {
		    printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
	    }

	    mysqli_free_result($res);
	    mysqli_close($mysqli);
    }
    ?>
    </div>
  </body>
</html>