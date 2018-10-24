<?php
    require_once ("database.php");
    
    $name =  filter_input(INPUT_POST, "name");
    if(!isset($name)) {
        include("add_artist_form.php");
        exit();
    }
    $description =  filter_input(INPUT_POST, "description");
    $occupation =  filter_input(INPUT_POST, "occupation");
    $twitter =  filter_input(INPUT_POST, "twitter");
    $age = filter_input(INPUT_POST, "age");

    $path = "assets/accounts/".$name;
    if (!file_exists($path)) {
        mkdir($path);
    }
    
    $path2 = "assets/accounts/".$name."/Art";
    if (!file_exists($path2)) {
        mkdir($path2);
    }
    
    $info = pathinfo($_FILES['profilePic']['name'], PATHINFO_EXTENSION);
    if (!isset($info)) {
        include("add_artist_form.php");
        echo "<h2 id = notif>Please add a profile picture.</h2>";
    }
    else {
        $profilePicName = "profilePic.".$info; 
        $target = $path."/".$profilePicName;
        move_uploaded_file( $_FILES['profilePic']['tmp_name'], $target);
    }
    
    $info2 = pathinfo($_FILES['background']['name'], PATHINFO_EXTENSION);
    if (!isset($info2)) {
        include("add_artist_form.php");
        echo "<h2 id = notif>Please add a background image.</h2>";
    }
    else {
        $backgroundName = "background.".$info2; 
        $target2 = $path."/".$backgroundName;
        move_uploaded_file( $_FILES['background']['tmp_name'], $target2);
    }
    
    $info3 = pathinfo($_FILES['header']['name'], PATHINFO_EXTENSION);
    if (!isset($info3)) {
        include("add_artist_form.php");
        echo "<h2 id = notif>Please add a header.</h2>";
    }
    else {
        $headerName = "header.".$info3; 
        $target3 = $path."/".$headerName;
        move_uploaded_file( $_FILES['header']['tmp_name'], $target3);
    }
    
    $insertQuery = "insert into artists (artist_name, description, occupation, website, age) "
            . "values (:np_name, :np_description, :np_occupation, :np_twitter, :np_age)";
    $statement = $db -> prepare($insertQuery);
    $statement -> bindValue(":np_name", $name);
    $statement -> bindValue(":np_description", $description);
    $statement -> bindValue(":np_occupation", $occupation);
    $statement -> bindValue(":np_twitter", "https://twitter.com/".$twitter);
    $statement -> bindValue(":np_age", $age);
    $statement -> execute();
    $statement -> closeCursor();
    
    $queryArtistID = "SELECT MAX(artist_id) from artists";
    $statement1 = $db -> query($queryArtistID);
    $statement1 -> execute();
    $number = $statement1 -> fetch(0);
    $artistID = $number[0];
    $statement1 -> closeCursor();
    
    $insertQuery2 = "insert into artist_assets (artist_id, background, profile_pic, header) "
            . "values (:np_artistID, :np_background, :np_profile_pic, :np_header)";
    $statement2 = $db -> prepare($insertQuery2);
    $statement2 -> bindValue(":np_artistID", $artistID);
    $statement2 -> bindValue(":np_background", $target2);
    $statement2 -> bindValue(":np_profile_pic", $target);
    $statement2 -> bindValue(":np_header", $target3);
    $statement2 -> execute();
    $statement2 -> closeCursor();
    
    include("add_art_form.php");
?>