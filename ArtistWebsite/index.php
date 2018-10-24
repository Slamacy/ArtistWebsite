<?php
    require_once ("database.php");
    
    $query = "SELECT * from artists ORDER BY artist_id";
    $statement = $db -> prepare($query);
    $statement -> execute();
    $allartists = $statement -> fetchAll();
    $statement -> closecursor();
    
    $query2 = "SELECT * from artist_assets ORDER BY assets_id";
    $statement1 = $db -> prepare($query);
    $statement1 -> execute();
    $assets = $statement1 -> fetchAll();
    $statement1 -> closecursor();
    
    if (!isset($artistID)) {
        $artistID = filter_input(INPUT_GET, "artistID", FILTER_VALIDATE_INT);
        if ($artistID == NULL || $artistID == FALSE) {
            $artistID = 1;
        }
    }
    
    $queryArtist = "SELECT * from artists, artist_assets WHERE artists.artist_id = artist_assets.artist_id";
    $statement2 = $db -> prepare($queryArtist);
    $statement2 ->bindValue(":artistID", $artistID);
    $statement2 -> execute();
    $artists = $statement2 -> fetchAll();
    $statement2 -> closeCursor();
    
    $totalAge = 0;
    $ages = 0;
    foreach ($allartists as $artist) {
        $totalAge += $artist["age"];
        $ages++;
    }
    $averageAge = $totalAge / $ages;
    //$profile_pics = array(
    //    $artist["artist_id"] => $artist_assets["profile_pic"]
    //) 
    ////this blew everything up lmao
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
            Artists I Know : Home
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
            <div id = "indexBody">
                <h1>Artists I Know</h1>
                <?php foreach ($artists as $artist){ ?>
                    <div>
                        <form action = "artist.php" method = "POST">
                            <input type = "hidden" name = "artistID" value = "<?php echo $artist["artist_id"]; ?>"/>
                            <input type = "image" src = "<?php echo $artist["profile_pic"]; ?>" id = "profPic">
                        </form>
                        <h2><?php echo $artist["artist_name"] ?></h2>
                        <br/>
                    </div>
                <?php } ?>
            </div>
            <div id = "stats">
                <h1>Stats</h1>
                <h2>Total num of artists: <?php echo $ages ?></h2>
                <h2>Average artist age: <?php echo $averageAge ?></h2>
                <br/>
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