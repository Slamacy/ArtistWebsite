<?php
    require_once ("database.php");
    
    $artistID = filter_input(INPUT_POST, "artistID");
    
    if(!isset($artistID)) {
        include("index.php");
        exit();
    }
    //print_r($artistID);
    //$name = filter_input(INPUT_POST, "artist_name");
    //$description = filter_input(INPUT_POST, "description");
    //$occupation = filter_input(INPUT_POST, "occupation");
    //$website = filter_input(INPUT_POST, "website");
    //$age = filter_input(INPUT_POST, "age");
    
    $queryByArtistID = "SELECT * from artists where artist_id = :artistID";
    $statement1 = $db -> prepare($queryByArtistID);
    $statement1 -> bindValue(":artistID", $artistID);
    $statement1 -> execute();
    $artist = $statement1 -> fetch();
    $statement1 -> closeCursor();
    
    $queryArtistArray = "SELECT * from artist_assets WHERE artist_id = :artistID";
    $statement3 = $db -> prepare($queryArtistArray);
    $statement3 -> bindValue(":artistID", $artistID);
    $statement3 -> execute();
    $artist_assets = $statement3 -> fetch();
    $statement3 -> closeCursor();
    
    $queryArtPieces = "SELECT * from art WHERE art.artist_id = :artistID";
    $statement4 = $db -> prepare($queryArtPieces);
    $statement4 -> bindValue(":artistID", $artistID);
    $statement4 -> execute();
    $art_pieces = $statement4 -> fetchAll();
    $statement4 -> closeCursor();
    
    $queryArtist = "SELECT * from artists, artist_assets WHERE artists.artist_id = artist_assets.artist_id";
    $statement2 = $db -> prepare($queryArtist);
    $statement2 -> execute();
    $artists = $statement2 -> fetchAll();
    $statement2 -> closeCursor();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href = "css/style.css"> 
        <meta charset="UTF-8">
	<meta name = "description" content= "artists i know website"> 
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
            Artists I Know : <?php echo $artist["artist_name"]; ?>
        </title>
        <?php
            if (isset($artistID)) {
               echo "<style>";
               echo "   #header {";
               echo "       background-image: url(" . $artist_assets["header"]. ");";
               echo "       background-position: center;";
               echo "       width: 100%;";
               echo "       height: 300px;";
               echo "   }";
               echo "   body {";
               echo "       background-image: url(" . $artist_assets["background"] . ");";
               echo "       background-repeat: vertical;";
               echo "       background-position: top; ";
               echo "       background-size: 100%, 100%; ";
               echo "   }";
               echo "</style>";
            }
        ?>
    </head>
    <body>
        <div id = "otherContainer">
            <div id = "header"></div>
            <div id = "offsetNavbar"> <!-- unnecessary ids out the wazoo -->
                <a href = "index.php">Home</a> <b>|</b>
                <a href = "add_artist_form.php">Add Artist</a> <b>|</b>
                <a href = "remove_artist_form.php">Remove Artist</a> <b>|</b>
                <a href = "remove_art_form.php">Remove Art</a> <b>|</b>
                <a href = "viewAllArt.php">View All</a>
            </div>
            <div  id = "links">
                <nav>
                    <img src = "<?php echo $artist_assets["profile_pic"]; ?>" id = "profPic">
                    <h3><?php echo $artist["artist_name"]; ?></h3>
                    <h4><?php echo $artist["description"]; ?></h4>
                    <h2><?php echo $artist["occupation"]; ?></h2>
                    <h2><?php echo "Age: " . $artist["age"]; ?></h2>
                    <h2><?php echo "<a href = ". $artist["website"] . ">Twitter</a>" ?></h2>
                </nav>
                <form action = "edit_artist_form.php" method = "POST" id = "edit">
                    <input type = "hidden" name = "artistID" value = "<?php echo $artistID; ?>"/>
                    <input type = "submit" value = "Edit Artist">
                </form>
                <form action = "edit_art_form.php" method = "POST" id = "edit2">
                    <input type = "hidden" name = "artistID" value = "<?php echo $artistID; ?>"/>
                    <input type = "submit" value = "Edit Art">
                </form>
            </div>
            <div id = "body">
                <h1><?php echo "Some of " . $artist["artist_name"] . "'s Art!" ?></h1>
                <?php foreach ($art_pieces as $image){ ?>
                    <div id = "art">
                        <img src = "<?php echo $image["file_path"]; ?>" alt = "<?php echo $image["art_name"]; ?>" id = "image"/>
                        <h5><?php echo $image["art_name"]; ?></h5>
                        <h5><?php echo $image["date"]; ?></h5>
                    </div>
                <?php } ?>
            </div>
            <div id = "otherFooter">
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
