<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href = "css/style.css"> 
        <meta charset="UTF-8">
	<meta name = "description" content= "dkit artist website"> 
	<meta name = "keywords" content = "art, website, index, artist, digital art, digital,
					home, homepage, traditional art, traditional, paintings,
                                        paints">
                                        <!-- too many :I -->
	<meta name = "author" content = "Oisin Murphy - D00191700"> <!-- i made this -->
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0"> <!-- for make phone nice -->
	<link rel = "icon" type = "image/png" sizes = "16x16" href = "images/favicons/FILL ME IN">
	<link rel = "icon" type = "image/png" sizes = "32x32" href = "images/favicons/FILL ME IN">
	<link rel = "icon" type = "image/png" sizes = "96x96" href = "images/favicons/FILL ME IN"> <!-- ICONNNN UGHHHNNG D: -->
        <title>
            Artists of GD2a : ERROR PAGE!
        </title>
    </head>
    <body>
        <div id = "otherHeader">
            <h1>AN ERROR HAS OCCURRED!</h1>
        </div>
        <br>
        <div id = "container">
            <div id = "navbar">
                <a href = "index.php">Home</a> <b>|</b>
                <a href = "add_artist_form.php">Add Artist</a> <b>|</b>
                <a href = "remove_artist_form.php">Remove Artist</a> <b>|</b>
                <a href = "remove_art_form.php">Remove Art</a> <b>|</b>
                <a href = "viewAllArt.php">View All</a>
            </div>
            <div id = "otherBody">
                <p>There was an error connecting to the database.</p>
                <p>Check that the database is installed &amp; named correctly</p>
                <p>Error message: <?php echo $error_message; ?></p>
            </div>
            <div id = "indexFooter">
                <p>
                    All artists included on this website have total ownership of any art featured on their page<br/>
                    (This may exclude profile pictures, header images or backgrounds).<br/>
                    Do not attempt to use / copy / repost any of these pieces without the artist's permission or correct citation.<br/>
                    To contact, you may follow the link to their respective twitter pages and shoot them a direct message.<br/>
                </p>
                <img src = "assets/default/littleThing.png" alt="Slamacy thingy"/>
                <b>
                <p id = "copy">Created by Oisin Murphy &copy; 2017</p> <!-- so many ids D: -->
                </b>
            </div>
        </div>
    </body>
</html>
