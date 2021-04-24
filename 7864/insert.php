<?php
$mysqli = mysqli_connect('sql212.epizy.com',"epiz_27689269","Nb2SxGP6UGl",'epiz_27689269_test');

if (mysqli_connect_errno()) 
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else 
{
	$lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
	$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
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
?>