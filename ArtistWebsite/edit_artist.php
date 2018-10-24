<?php
    require_once ("database.php");
    
    $artistID = filter_input(INPUT_POST, "artistID");
    $name =  filter_input(INPUT_POST, "name");
    if(!isset($name)) {
        include("add_artist_form.php");
        echo "<h2 id = 'notif'>Please input an artist name.<h2>";
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
    if ($info != "") {
        $profilePicName = "profilePic.".$info; 
        $target = $path."/".$profilePicName;
        move_uploaded_file( $_FILES['profilePic']['tmp_name'], $target);
        
        $insertQuery2 = "update artist_assets set profile_pic = :profilePic WHERE artist_id = :artistID";
        $statement2 = $db -> prepare($insertQuery2);
        $statement2 -> bindValue(":profilePic", $target);
        $statement2 -> bindValue(":artistID", $artistID);
        $statement2 -> execute();
        $statement2 -> closeCursor();
    }
    
    $info2 = pathinfo($_FILES['background']['name'], PATHINFO_EXTENSION);
    if ($info2 != "") {
        $backgroundName = "background.".$info2; 
        $target2 = $path."/".$backgroundName;
        move_uploaded_file( $_FILES['background']['tmp_name'], $target2);
        
        $insertQuery2 = "update artist_assets set background = :background WHERE artist_id = :artistID";
        $statement2 = $db -> prepare($insertQuery2);
        $statement2 -> bindValue(":background", $target2);
        $statement2 -> bindValue(":artistID", $artistID);
        $statement2 -> execute();
        $statement2 -> closeCursor();
    }
    
    $info3 = pathinfo($_FILES['header']['name'], PATHINFO_EXTENSION);
    if ($info3 != "") {
        $headerName = "header.".$info3; 
        $target3 = $path."/".$headerName;
        move_uploaded_file( $_FILES['header']['tmp_name'], $target3);
        
        $insertQuery2 = "update artist_assets set header = :header WHERE artist_id = :artistID";
        $statement2 = $db -> prepare($insertQuery2);
        $statement2 -> bindValue(":header", $target3);
        $statement2 -> bindValue(":artistID", $artistID);
        $statement2 -> execute();
        $statement2 -> closeCursor();
    }
    
    $insertQuery = "update artists set artist_name = :name, "
            . "description = :description,"
            . "occupation = :occupation,"
            . "website = :twitter,"
            . "age = :age WHERE artist_id = :artistID";
    $statement = $db -> prepare($insertQuery);
    $statement -> bindValue(":name", $name);
    $statement -> bindValue(":description", $description);
    $statement -> bindValue(":occupation", $occupation);
    $statement -> bindValue(":twitter", $twitter);
    $statement -> bindValue(":age", $age);
    $statement -> bindValue(":artistID", $artistID);
    $statement -> execute();
    $statement -> closeCursor();

    include("index.php");
    echo "<h2 id = 'notifGood'>Artist has been edited.<h2>";
    exit();
?>

