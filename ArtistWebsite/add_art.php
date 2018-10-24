<?php
    include_once("database.php");
    
    $artistID = filter_input(INPUT_POST, "artistID");
    //print_r($artistID);
    
    $query = "SELECT artist_name FROM artists WHERE artist_id = :np_artistID";
    $statement4 = $db -> prepare($query);
    $statement4 -> bindValue(":np_artistID", $artistID);
    $statement4 -> execute();
    $artistName = $statement4 -> fetch();
    $name = $artistName[0];
    $statement4 -> closeCursor();
    
    $path = "assets/accounts/".$name."/Art";
    if (!file_exists($path)) {
        mkdir($path);
    }
    
    $info = pathinfo($_FILES['art1']['name'], PATHINFO_EXTENSION);
    if (isset($info)) {
        $art1Name = "art1.".$info; 
        $target = $path."/".$art1Name;
        move_uploaded_file( $_FILES['art1']['tmp_name'], $target);
    }
    
    $info2 = pathinfo($_FILES['art2']['name'], PATHINFO_EXTENSION);
    if(isset($info2)) {
        $art2Name = "art2.".$info2; 
        $target2 = $path."/".$art2Name;
        move_uploaded_file( $_FILES['art2']['tmp_name'], $target2);
    }
    
    $info3 = pathinfo($_FILES['art3']['name'], PATHINFO_EXTENSION);
    if(isset($info3)) {
        $art3Name = "art3.".$info3; 
        $target3 = $path."/".$art3Name;
        move_uploaded_file( $_FILES['art3']['tmp_name'], $target3);
    }
    
    $art1Title = filter_input(INPUT_POST, "art1Name");
    $art2Title = filter_input(INPUT_POST, "art2Name");
    $art3Title = filter_input(INPUT_POST, "art3Name");
    
    $art1Date = filter_input(INPUT_POST, "art1Date");
    $art2Date = filter_input(INPUT_POST, "art2Date");
    $art3Date = filter_input(INPUT_POST, "art3Date");
    
    $insertQuery = "insert into art (artist_id, date, art_name, file_path) "
            . "values (:np_id, :np_date, :np_art_title, :np_file_path)";
    $statement = $db -> prepare($insertQuery);
    $statement -> bindValue(":np_id", $artistID);
    $statement -> bindValue(":np_date", $art1Date);
    $statement -> bindValue(":np_art_title", $art1Title);
    $statement -> bindValue(":np_file_path", $target);
    $statement -> execute();
    $statement -> closeCursor();
    
    $insertQuery2 = "insert into art (artist_id, date, art_name, file_path) "
            . "values (:np_id, :np_date, :np_art_title, :np_file_path)";
    $statement2 = $db -> prepare($insertQuery2);
    $statement2 -> bindValue(":np_id", $artistID);
    $statement2 -> bindValue(":np_date", $art2Date);
    $statement2 -> bindValue(":np_art_title", $art2Title);
    $statement2 -> bindValue(":np_file_path", $target2);
    $statement2 -> execute();
    $statement2 -> closeCursor();
    
    $insertQuery3 = "insert into art (artist_id, date, art_name, file_path) "
            . "values (:np_id, :np_date, :np_art_title, :np_file_path)";
    $statement3 = $db -> prepare($insertQuery3);
    $statement3 -> bindValue(":np_id", $artistID);
    $statement3 -> bindValue(":np_date", $art3Date);
    $statement3 -> bindValue(":np_art_title", $art3Title);
    $statement3 -> bindValue(":np_file_path", $target3);
    $statement3 -> execute();
    $statement3 -> closeCursor();
    
    include ("index.php");
    echo "<h2 id = 'notifGood'>Your artist has been added.<h2>";
    exit();
?>


