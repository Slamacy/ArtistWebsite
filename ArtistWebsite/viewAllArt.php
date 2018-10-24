<?php
    require_once ("database.php");
    
    $artistID = 1;
    
    $query2 = "SELECT * from art WHERE artist_id = :artistID";
    $statement1 = $db -> prepare($query2);
    $statement1 ->bindValue(":artistID", $artistID);
    $statement1 -> execute();
    $art = $statement1 -> fetchAll();
    $statement1 -> closecursor();
    
    $queryArtist = "SELECT * from artists, art WHERE artists.artist_id = art.artist_id";
    $statement2 = $db -> prepare($queryArtist);
    $statement2 ->bindValue(":artistID", $artistID);
    $statement2 -> execute();
    $artists = $statement2 -> fetchAll();
    $statement2 -> closeCursor();
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
            Artists I Know : View All
        </title>
    </head>
    <body>
        <div id = "container">
            <div id = "header">
                <img src = "assets/default/header.png"/>
            </div>
            <div id = "navbar">
                <a href = "index.php">Home</a> <b>|</b>
                <a href = "add_artist_form.php">Add Artist</a> <b>|</b>
                <a href = "remove_artist_form.php">Remove Artist</a> <b>|</b>
                <a href = "remove_art_form.php">Remove Art</a> <b>|</b>
                <a href = "viewAllArt.php">View All</a>
            </div>
            <div id = "sorts">
                <h2>Sort by:</h2>
                <form action = "viewArtByDate.php" id = "order">
                    <input type = "submit" value = "Date">
                </form>
                <form action = "viewArtByName.php" id = "order2">
                    <input type = "submit" value = "Name">
                </form>
            </div>
            <div id = "indexBody">
                <h1>All Art</h1>
                
                <?php foreach($artists as $artist) { ?>
                    <div id = "art">
                        <img src = "<?php echo $artist["file_path"]; ?>" alt = "<?php echo $artist["art_name"]; ?>" id = "image"/>
                        <h5><?php echo $artist["art_name"]; ?></h5>
                        <h5>By <?php echo $artist["artist_name"]; ?></h5>
                        <h5><?php echo $artist["date"]; ?></h5>
                    </div>
                <?php } ?>
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