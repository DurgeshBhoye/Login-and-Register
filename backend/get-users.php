<?php

header('Access-Control-Allow-Origin: *');    // add this line to access this file from any file in this project
// Video 1

header('Content-Type: application/json'); // this line make this below plain text to JSON

// video 2  -- - this line means connect to the database from here

require_once(__DIR__.'/protected/database.php'); // this is allow us connect to the db one time
// this line is going to this above mentioned path inside require and access all the code inside database.php file and replaces this require line by that all code inside database.php


try{
    $q = $db->prepare('SELECT * FROM user_form');
    $q->execute();
    $rows = $q->fetchAll();
    echo '{"status":1, "data":'.json_encode($rows).'}';  // this row will get the data from the database below result -  
    // {"status":1, "data":[{"id":1,"name":"A","picture_name":"a.png"},{"id":2,"name":"B","picture_name":"b.png"}]}
    exit();

}catch(PDOException $ex){
    err('error executing query', __LINE__);
}






// video 3
// 
function err($message = 'error', $debug = 0){    // if error
    echo '{"status":0,
           "message": "'.$message.'",
           "debug":'.debug.'}';
    exit();
}




// to get full array of users in the database use below command
// http://localhost/coders/coders_page/back/get-users.php