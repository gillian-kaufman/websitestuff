<?php require_once("auth.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Search Cards By Color</title>
    </head>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        <h1>MTG Card Collection Demo</h1>
        <p>Choose a card color to see a list of cards of that color.<br>
        <i>Please give the server time to load the card you are looking for. Sometimes it takes a minute.</i></p>
        <button><a href="searchname.php">Search Cards by Name</a></button>
        <button><a href="collection.php">Home</a></button>
        <button><a href="searchcolor.php">Search Cards by Color</a></button>
        <br>
        <h4>Search Cards by Color:</h4>
        Choose color:
        <select id = "colorinput">
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
            <option value="black">Black</option>
            <option value="white">White</option>        
        </select>
        <button id="colorbutton" type = "submit">Submit</button>
        <button id="toTop" title="Go to top">Top</button>
        <br>
        <br>
        <div class = "cardlist" style="text-align: center;"></div>
        <div class = "container2">
            <div class="cardimg"></div>
            <div class="flipcardimg"></div>
            <div class="cardcontent"></div>
        </div>
        <script type="text/javascript" src="collection.js"></script>
    </body>
</html>