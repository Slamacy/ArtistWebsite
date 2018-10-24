<?php 
    require_once ("database.php");
    
    $artistID = filter_input(INPUT_POST, "artistID");
    
    $query = "SELECT * from artists WHERE artist_id = :artistID";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":artistID", $artistID);
    $statement -> execute();
    $artist = $statement -> fetch();
    $statement -> closecursor();
    
    $query2 = "SELECT * from art WHERE artist_id = :artistID";
    $statement1 = $db -> prepare($query2);
    $statement1 -> bindValue(":artistID", $artistID);
    $statement1 -> execute();
    $art = $statement1 -> fetchAll();
    $statement1 -> closecursor();
    
    $num = 1;
?>
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
	<link rel = "icon" type = "image/png" sizes = "32x32" href = "assets/default/favicon32x32.png">
	<link rel = "icon" type = "image/png" sizes = "64x64" href = "assets/default/favicon64x64.png">
	<link rel = "icon" type = "image/png" sizes = "128x128" href = "assets/default/favicon128x128.png"> <!-- ICONNNN UGHHHNNG D: -->
        <title>
            Artists I Know : Edit Artist
        </title>
    </head>
    <body>
        <div id = "otherHeader">
            <h1>Edit your art!</h1>
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
                <form action = "edit_art.php" method = "POST" enctype = "multipart/form-data">
                    <h2>Art</h2>
                    <label>1st Piece: </label>
                    <input type = "file" name = "art1" accept = "image/*"><br/>
                    <label>Art name: </label>
                    <input type = "text" name = "art1Name"><br/>
                    <label>Date: </label>
                    <input type = "date" name = "art1Date"><br/>
                    <br/><br/>
                    <label>2nd Piece: </label>
                    <input type = "file" name = "art2" accept = "image/*"><br/>
                    <label>Art name: </label>
                    <input type = "text" name = "art2Name"><br/>
                    <label>Date: </label>
                    <input type = "date" name = "art2Date"><br/>
                    <br/><br/>
                    <label>3rd Piece: </label>
                    <input type = "file" name = "art3" accept = "image/*"><br/>
                    <label>Art name: </label>
                    <input type = "text" name = "art3Name"><br/>
                    <label>Date: </label>
                    <input type = "date" name = "art3Date"><br/>
                    <br/><br/>
                    <input type = "hidden" name = "artistID" value = "<?php echo $artistID ?>"/>
                    <input type = "submit" value = "Submit Edit">
                    <!-- REPLACE WITH IMAGE LATER -->
                </form>
                <?php foreach($art as $image) { ?>
                    <img src = "<?php echo $image["file_path"]; ?>" id = "artPreview<?php echo $num; ?>" alt = "previousArt"/> <br/>
                    <?php $num++; ?>
                <?php } ?>
                <!-- POSSIBLY ADD SOME SIDE IMAGE TO SPICE UP THE PAGE? -->
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
