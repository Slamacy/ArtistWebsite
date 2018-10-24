<?php
    require_once ("database.php");
    $artistID = filter_input(INPUT_POST, "artistID");
    
    $query = "SELECT MIN(art_id) from art WHERE artist_id = :artistID";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":artistID", $artistID);
    $statement -> execute();
    $art = $statement -> fetch();
    print_r($art);
    $artID = $art[0];
    print_r($artID);
    $statement -> closecursor();
    
    $query2 = "SELECT artist_name from artists WHERE artist_id = :artistID";
    $statement2 = $db -> prepare($query2);
    $statement2 -> bindValue(":artistID", $artistID);
    $statement2 -> execute();
    $name = $statement2 -> fetch();
    $artistName = $name[0];
    print_r($artistName);
    $statement2 -> closecursor();
    
    $art1Title = filter_input(INPUT_POST, "art1Name");
    $art2Title = filter_input(INPUT_POST, "art2Name");
    $art3Title = filter_input(INPUT_POST, "art3Name");
    
    $art1Date = filter_input(INPUT_POST, "art1Date");
    $art2Date = filter_input(INPUT_POST, "art2Date");
    $art3Date = filter_input(INPUT_POST, "art3Date");

    $path = "assets/accounts/".$artistName."/Art";
    if (!file_exists($path)) {
        mkdir($path);
    }
    
    $info = pathinfo($_FILES['art1']['name'], PATHINFO_EXTENSION);
    if ($info != "") {
        $artName = $art1Title.".".$info; 
        $target = $path."/".$artName;
        move_uploaded_file( $_FILES['art1']['tmp_name'], $target);
        
        $insertQuery2 = "update art set date = :date,"
                . "file_path = :path,"
                . "art_name = :title WHERE art_id = :artID";
        $statement3 = $db -> prepare($insertQuery2);
        $statement3 -> bindValue(":date", $art1Date);
        $statement3 -> bindValue(":path", $target);
        $statement3 -> bindValue(":title", $art1Title);
        $statement3 -> bindValue(":artID", $artID);
        $statement3 -> execute();
        $statement3 -> closeCursor();
    }
    
    $artID++;
    
    $info2 = pathinfo($_FILES['art2']['name'], PATHINFO_EXTENSION);
    if ($info2 != "") {
        $artName = $art2Title.".".$info2; 
        $target = $path."/".$artName;
        move_uploaded_file( $_FILES['art2']['tmp_name'], $target);
        
        $insertQuery2 = "update art set date = :date,"
                . "file_path = :path,"
                . "art_name = :title WHERE art_id = :artID";
        $statement3 = $db -> prepare($insertQuery2);
        $statement3 -> bindValue(":date", $art2Date);
        $statement3 -> bindValue(":path", $target);
        $statement3 -> bindValue(":title", $art2Title);
        $statement3 -> bindValue(":artID", $artID);
        $statement3 -> execute();
        $statement3 -> closeCursor();
    }
    
    $artID++;
    
    $info3 = pathinfo($_FILES['art3']['name'], PATHINFO_EXTENSION);
    if ($info3 != "") {
        $artName = $art3Title.".".$info3; 
        $target = $path."/".$artName;
        move_uploaded_file( $_FILES['art3']['tmp_name'], $target);
        
        $insertQuery2 = "update art set date = :date,"
                . "file_path = :path,"
                . "art_name = :title WHERE art_id = :artID";
        $statement3 = $db -> prepare($insertQuery2);
        $statement3 -> bindValue(":date", $art3Date);
        $statement3 -> bindValue(":path", $target);
        $statement3 -> bindValue(":title", $art3Title);
        $statement3 -> bindValue(":artID", $artID);
        $statement3 -> execute();
        $statement3 -> closeCursor();
    }

    include("index.php");
    echo "<h2 id = 'notifGood'>Art has been edited.<h2>";
    exit();
?>

