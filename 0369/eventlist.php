<?php require_once("auth.php");
require_once("config.php");

$sql='SELECT * FROM calendar_events WHERE userid='.$_SESSION['id'].'';

$result=$mysqli->query($sql);
$events = [];
if($result->num_rows > 0) 
{
	$events = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
	<head>
		<title>Your Event List</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="calendar.css">
        <style type="text/css">
            body 
            {
                font-family: 'Open Sans', sans-serif;
            }
            .table-wrapper 
            {
                width: 100%;
                margin: 30px auto;
                background: #fff;
                padding: 20px; 
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }
            .table-title 
            {
                padding-bottom: 10px;
                margin: 0 0 10px;
            }
            .table-title h2 
            {
                margin: 6px 0 0;
                font-size: 22px;
            }
            .table-title .add-new 
            {
                float: right;
                height: 30px;
                font-weight: bold;
                font-size: 12px;
                text-shadow: none;
                min-width: 100px;
                border-radius: 50px;
                line-height: 13px;
            }
            .table-title .add-new i 
            {
                margin-right: 4px;
            }
            table.table 
            {
                table-layout: fixed;
            }
            table.table tr th, table.table tr td 
            {
                border-color: #efefef;
            }
            table.table th i 
            {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }
            table.table th:last-child 
            {
                width: 100px;
            }
            table.table td a 
            {
                cursor: pointer;
                display: inline-block;
                margin: 0 5px;
                min-width: 24px;
            }   
            table.table td a.add 
            {
                color: #27C46B;
            }
            table.table td a.edit 
            {
                color: #FFC107;
            }
            table.table td a.delete 
            {
                color: #E34724;
            }
            table.table td i 
            {
                font-size: 19px;
            }
            table.table td a.add i 
            {
                font-size: 24px;
                margin-right: -1px;
                position: relative;
                top: 3px;
            }    
            table.table .form-control 
            {
                height: 32px;
                line-height: 32px;
                box-shadow: none;
                border-radius: 2px;
            }
            table.table .form-control.error 
            {
                border-color: #f50000;
            }
            table.table td .add 
            {
                display: none;
            }
        </style>
	</head>
	<body>
		<header>
			<nav class="navi">
				<ul>
					<li class="logo"><a href="../index.html">Happy Vegan Bunny</a></li>
                    <li class="links"><a href="../index.html">Home</a></li>
					<li class="links"><a href="calendar.php">Calendar</a></li>
                    <li class="links"><a href="eventlist.php">Your Events</a></li>
                    <li class="links"><a href="logout.php">Log Out</a></li>
				</ul>
			</nav>	
		</header>
		<div class="container">
            <div id="displaymessage"></div>
            <p><h1 style="text-align: center;">Your Event List</h1></p>
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Event List</h2></div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Event Description</th>
                        <th>Event Category</th>
                        <th>Event Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($events)) { ?>
                    <?php foreach($events as $event) { ?>
                        <tr>
                            <td><?php echo $event['event_title']; ?></td>
                            <td><?php echo $event['event_shortdesc']; ?></td>
                            <td><?php echo $event['event_category']; ?></td>
                            <td><?php echo $event['event_start']; ?></td>
                            <td>
                                <a class="add" title="Add" data-toggle="tooltip" id="<?php echo $event['id']; ?>"><i class="fa fa-user-plus"></i></a>
                                <a class="edit" title="Edit" data-toggle="tooltip" id="<?php echo $event['id']; ?>"><i class="fa fa-pencil"></i></a>
                                <a class="delete" title="Delete" data-toggle="tooltip" id="<?php echo $event['id']; ?>"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>   
                </tbody>
                </table>
            </div>
        </div>     
        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src = "https://code.jquery.com/jquery-1.12.4.js"></script>
    	<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src = "calendar.js"></script>
	</body>
</html>