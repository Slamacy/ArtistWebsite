<?php
    include_once ("database.php");
    
    $query = "SELECT * from artists ORDER BY artist_id";
    $statement = $db -> prepare($query);
    $statement -> execute();
    $artists = $statement -> fetchAll();
    $statement -> closecursor();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href = "css/style.css"> 
        <meta charset="UTF-8">
	<meta name = "description" content= "artist i know website"> 
	<meta name = "keywords" content = "art, website, index, artist, digital art, digital,
					home, homepage, traditional art, traditional, paintings,
                                        paints">
                                        <!-- too many :I -->
	<meta name = "author" content = "Oisin Murphy - D00191700"> <!-- i made this -->
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0"> <!-- for make phone nice -->
	<link rel = "icon" type = "image/png" sizes = "32x32" href = "assets/default/favicon32x32.png">
	<link rel = "icon" type = "image/png" sizes = "64x64" href = "assets/default/favicon64x64.png">
	<link rel = "icon" type = "image/png" sizes = "128x128" href = "assets/default/favicon128x128.png"> <!-- ICONNNN UGHHHNNG D: -->
        <title>
            Artists I Know : Remove Artist
        </title>
    </head>
    <body>
        <div id = "container">
            <div id = "otherHeader">
                <h1>Remove Artist</h1>
            </div>
            <br/>
            <div id = "navbar">
                <a href = "index.php">Home</a> <b>|</b>
                <a href = "add_artist_form.php">Add Artist</a> <b>|</b>
                <a href = "remove_artist_form.php">Remove Artist</a> <b>|</b>
                <a href = "remove_art_form.php">Remove Art</a> <b>|</b>
                <a href = "viewAllArt.php">View All</a>
            </div>
            <div id = "otherBody">
                <h2>Please choose an artist to remove.</h2>
                <form action = "remove_artist.php" method = "POST">
                    <select name = "artistID">
                        <?php foreach ($artists as $artist){ ?>
                            <option value = "<?php echo $artist["artist_id"]; ?>"><?php echo $artist["artist_id"] . " - " . $artist["artist_name"]; ?></option>
                        <?php } ?>
                    </select>
                    <br/><br/>
                    <input type = "submit" value = "Remove Artist">
                </form>
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