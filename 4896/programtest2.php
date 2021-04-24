<?php
$words = file("words.txt") or die("Unable to open file");

$novowels = array();
$onevowel = array();
$twovowels = array();
$threevowels = array();
$fourvowels = array();
$fivevowels = array();
$sixvowels = array();

function count_Vowels($string)
{
    preg_match_all('/[aeiou]/i', $string, $matches);
    return count($matches[0]);
}

for ($i = 0; $i < count($words); $i++)
{
    $count = count_Vowels($words[$i]);
    if ($count == 0)
    {
        array_push($novowels, $words[$i]);
    }
    else if ($count == 1)
    {
        array_push($onevowel, $words[$i]);
    }
    else if ($count == 2)
    {
        array_push($twovowels, $words[$i]);
    }
    else if ($count == 3)
    {
        array_push($threevowels, $words[$i]);
    }
    else if ($count == 4)
    {
        array_push($fourvowels, $words[$i]);
    }
    else if ($count == 5)
    {
        array_push($fivevowels, $words[$i]);
    }
    else if ($count == 6)
    {
        array_push($sixvowels, $words[$i]);
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>program test 2</title>
	</head>
	<link rel = "stylesheet" href = "../CSS/style.css">
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
                    <li class="links"><a href="4896/programtest2.php">program test 2</a></li>
				</ul>
			</nav>	
		</header>
        <br>
        <h1>Program Test 2</h1>
        <br>
        <form method="post">
            <input type="submit" name="button0" value="No Vowels"/>
            <input type="submit" name="button1" value="One Vowel"/>
            <input type="submit" name="button2" value="Two Vowels"/>
            <input type="submit" name="button3" value="Three Vowels"/>
            <input type="submit" name="button4" value="Four Vowels"/>
            <input type="submit" name="button5" value="Five Vowels"/>
            <input type="submit" name="button6" value="Six Vowels"/>
        </form>
        <br>
        <div class = "buttonoutput" style = "display: grid; grid-template-columns: repeat(3, auto); grid-column-gap: 300px;">
            <div></div>
            <div style = "height: 400px; overflow: auto">
                <?php
                if (isset($_POST['button0'])) 
                { 
                    echo implode("<br>", $novowels);
                } 
                if (isset($_POST['button1'])) 
                { 
                    echo implode("<br>", $onevowel);
                }
                if (isset($_POST['button2'])) 
                { 
                    echo implode("<br>", $twovowels);
                } 
                if (isset($_POST['button3'])) 
                { 
                    echo implode("<br>", $threevowels);
                } 
                if (isset($_POST['button4'])) 
                { 
                    echo implode("<br>", $fourvowels);
                } 
                if (isset($_POST['button5'])) 
                { 
                    echo implode("<br>", $fivevowels); 
                }
                if (isset($_POST['button6'])) 
                { 
                    echo implode("<br>", $sixvowels); 
                }  
                ?>
            </div>
            <div></div>
        </div>
    </body>
</html>