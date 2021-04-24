<?php
$mysqli = mysqli_connect('sql212.epizy.com',"epiz_27689269","Nb2SxGP6UGl",'epiz_27689269_test');

if (mysqli_connect_errno()) 
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else 
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
			echo "Last name: ".$lname." <br>First name: ".$fname."<br>Email: ".$email."<br>";
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