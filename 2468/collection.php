<?php require_once("auth.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Collections Web App Page</title>
    </head>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        <br>
        <br>
        <p>This collection app is a Magic: The Gathering collection app using <a href="https://scryfall.com/docs/api">Scryfall API</a> to scrape for cards, their images, and data.
           Click on one of the buttons below to either search for a card by name or search for a list of cards based on the color.
           There are several thousands of cards, so please be patient while the server fetches what you are looking for and translates the data into something readable.
           We appreciate you stopping by and checking out our collections!</p>
        <br>
        <button><a href="searchname.php">Search Cards by Name</a></button>
        <button><a href="searchcolor.php">Search Cards by Color</a></button>
        <br>
        <br>
        <p>A few statistics about Magic: The Gathering cards are listed below.</p>
        <br>
        <div class="cards"></div>        
        <div class="artists"></div>
        <div class="creatures"></div>
        <div class="artifacts"></div>
        <div class="enchantments"></div>
        <div class="lands"></div>
        <script type="text/javascript" src="collectionstats.js"></script>
    </body>
</html> 