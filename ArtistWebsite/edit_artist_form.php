<?php
    require_once("database.php");
    
    $artistID = filter_input(INPUT_POST, "artistID");
    
    $query = "SELECT * from artists WHERE artist_id = :artistID";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":artistID", $artistID);
    $statement -> execute();
    $artist = $statement -> fetch();
    $statement -> closecursor();
    
    $query2 = "SELECT * from artist_assets WHERE artist_id = :artistID";
    $statement1 = $db -> prepare($query2);
    $statement1 -> bindValue(":artistID", $artistID);
    $statement1 -> execute();
    $assets = $statement1 -> fetch();
    $statement1 -> closecursor();
    
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
            <h1>Edit <?php echo $artist["artist_name"]; ?>!</h1>
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
            <div id = "otherOtherBody"> <!-- im so sick of bodies -->
                <form action = "edit_artist.php" method = "POST" enctype = "multipart/form-data">
                    <h2>Artist info</h2>
                    <label>Artist username: </label><br/>
                    <input type = "text" name = "name" size = "30" value = "<?php echo $artist["artist_name"]; ?>"><br/><br/>
                    <label>Description: </label><br/>
                    <textarea type = "text" name = "description" rows = "4" cols = "50"><?php echo $artist["description"]; ?></textarea><br/><br/>
                    <label>Occupation: </label><br/>
                    <input type = "text" name = "occupation" size = "30" value = "<?php echo $artist["occupation"]; ?>"><br/><br/>
                    <label>Twitter link: </label><br/>
                    <input type = "text" name = "twitter" size = "30" value = "<?php echo $artist["website"]; ?>"><br/><br/>
                    <!-- Takes in twitter username and will sent to make a link in db -->
                    <label>Age: </label><br/>
                    <input type = "text" name = "age" size = "3"  value = "<?php echo $artist["age"]; ?>"><br/><br/>
                    <br/><br/>
                    <h2>Artist Assets</h2>
                    <label>Profile Picture: </label>
                    <input type = "file" name = "profilePic" accept="image/*"><br/><br/>
                    <label>Background Image: </label>
                    <input type = "file" name = "background" accept="image/*"><br/><br/>
                    <label>Header Image: </label>
                    <input type = "file" name = "header" accept="image/*"><br/><br/>
                    <br/><br/>
                    <input type = "hidden" name = "artistID" value = "<?php echo $artistID ?>"/>
                    <input type = "submit" value = "Submit Edit">
                    <!-- REPLACE WITH IMAGE LATER -->
                </form>
                    <img src = "<?php echo $assets["profile_pic"]; ?>" id = "preview1" alt = "previousProfilePic"/> <br/>
                    <img src = "<?php echo $assets["background"]; ?>" id = "preview2" alt = "previousBackground"/> <br/>
                    <img src = "<?php echo $assets["header"]; ?>" id = "preview3" alt = "previousHeader"/> <br/>
                
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
