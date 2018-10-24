<?php
    require_once ("database.php");
            
    $query = "DELETE from art where artist_id = :artistID";
    $statement1 = $db -> prepare($query);
    $statement1 -> bindValue(":artistID", $artistID);
    $statement1 -> execute();
    $statement1 -> closeCursor();
    
    include("add_art.php");
    echo "<h2 id = 'notif'>Art has been deleted.<h2>";
    exit();
?> 