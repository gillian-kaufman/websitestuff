<?php require_once("auth.php");
require_once("config.php");

$sql='SELECT card FROM list WHERE username='.$_SESSION['id'].'';

$stmt=$mysqli->query($sql);
$item = array();
while($obj = $stmt->fetch_object()) 
{
	$item[] = $obj;
}
?>

<!DOCTYPE html>
	<head>
		<title>Your Collection</title>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="../CSS/style.css">
 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src = "https://code.jquery.com/jquery-1.12.4.js"></script>
    	<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	</head>
	<body>
		<header>
			<nav class="navi">
				<ul>
					<li class="logo"><a href="../index.html">Happy Vegan Bunny</a></li>
                    <li class="links"><a href="../index.html">Collection Home</a></li>
                    <li class="links"><a href="collection.php">Collection Home</a></li>
                    <li class="links"><a href="cardlist.php">Your list</a></li>
                    <li class="links"><a href="logout.php">Log Out</a></li>
				</ul>
			</nav>	
		</header>
		<button id = "toTop" title = "Go to top">Top</button>
		<input type = "hidden" id = "cardlistJSON" value='<?php echo json_encode($item); ?>'>
		
		<div class="confirmation">
			<button id="button">Delete selected row</button>
		</div>
		<table id="myTable" class="display" style="width: 100%">
			<thead>
				<tr>
					<th>Card Name</th>
					<th>Card Type</th>
					<th>Card Mana Cost</th>
					<th>Card Set</th>
					<th>Card Rarity</th>
					<th>Card Description</th>
					<th>Flavor Text</th>
				</tr>
			</thead>
		</table>
		<script src = "collection.js"></script>
	</body>
</html>
