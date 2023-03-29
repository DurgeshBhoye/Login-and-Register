<?php

header('Access-Control-Allow-Origin: *'); // gives access to this file content to all files
// Video 1

header('Content-Type: application/json'); // this line make this below plain text to JSON


// // Validation
// // video 6
// if(!isset($_POST['name'])){err('name is missing', __LINE__);}
// if(strlen($_POST['name'])<2){err('name min 2 characters', __LINE__);}
// if(strlen($_POST['name'])<5){err('name max 5 characters', __LINE__);}

// // Validate a picture video 6
// if(!isset($_FILES['picture'])){err('picture missing', __LINE__);}
// // var_dump($_FILES['picture']);


// // video 6
// // png
// $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
// // echo $extension;


// // exit();




// video 2  -- - this line means connect to the database from here

require_once(__DIR__.'/protected/database.php'); // this is allow us connect to the db one time
// this line is going to this above mentioned path inside require and access all the code inside database.php file and replaces this require line by that all code inside database.php



try{
    // $q = $db->prepare("INSERT INTO `users`(`id`, `name`, `picture_name`) VALUES ('','D','d.png')");
    $q = $db->prepare("INSERT INTO `user_form`(`name`, `email`, `password`, `user_type`) VALUES (:name,:email,:password,:user_type)");
        // VALUES (null, :name, :pictureName');
    $q->bindValue(':name', $_POST['name']);
    $q->bindValue(':email', $_POST['email']);
    $q->bindValue(':password', $_POST['password']);
    $q->bindValue(':user_type', $_POST['user_type']);
    // $q->bindValue(':pictureName', $uniquePictureName);
    $q->execute();
    $userId = $db->lastInsertId();
    // $destinationFolder = __DIR__.'/pictures/';
    // $finalPath = $destinationFolder.$uniquePictureName;
    // move_uploaded_file($_FILES['picture']['tmp_name'], $finalPath);
    echo '{"status":1, "message":"User Created!", "id":"'.$userId.'"}'; //  this is plain text
}catch(PDOException $ex){
    err('cannot create user!', __LINE__);
}





// video 6
// 
function err($message = 'error', $debug = 0){    // if error
    echo '{"status":0,
           "message": "'.$message.'",
           "debug":'.debug.'}';
    exit();
}
