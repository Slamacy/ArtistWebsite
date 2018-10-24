<?php
    require_once ("database.php");
    
    $artistID = filter_input(INPUT_POST, "artistID");
    
    $query = "DELETE from artists where artist_id = :artistID";
    $statement1 = $db -> prepare($query);
    $statement1 -> bindValue(":artistID", $artistID);
    $statement1 -> execute();
    $statement1 -> closeCursor();
    
    include("index.php");
    echo "<h2 id = 'notif'>Artist has been deleted.<h2>";
    exit();
?>