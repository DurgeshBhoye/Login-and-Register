<?php

// echo '<b style="color: red; font-family: sans-serif; font-size: 30px;"> Steps to run PHP code </b><br><br>';

// echo '1. run xampp <br><br>'; // br for new line
// echo '2. C:\xampp\htdocs\coders\coders_page\back <br><br>';
// echo '3. make \ to / as below <br><br>';
// echo '4. http://localhost/coders/coders_page/back/get-user.php <br><br>';

// echo '<b style="color: green; font-family: sans-serif;">To run program paste line 4 in any browser </b>';

header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json'); // this will make this below plain text to JSON

// video 4
if(!isset($_GET['id'])){err('id missing', __LINE__);}
if(!ctype_digit($_GET['id'])){err('id not valid', __LINE__);}



// video 2   -- - this line means connect to the database from here

require_once(__DIR__.'/protected/database.php'); // this is allow us connect to the db one time
// this line is going to this above mentioned path inside require and access all the code inside database.php file and replaces this require line by that all code inside database.php


// video 4
try{
    $q = $db->prepare('SELECT * FROM `users` WHERE id = :id LIMIT 1');  // LIMIT only one
    $q->bindValue(':id', $_GET['id']);  // No SQL injection -- if we do this we have protected the system against typo injection
    $q->execute();
    $row = $q->fetch();   // display/use only one object which is not wrapped in array[]
    if(!$row){err('USER NOT FOUND!!!', __LINE__);}
    echo '{"status":1, "data":'.json_encode($row).'}';  // this row will get the data from the database below result -  
    // {"status":1, "data":[{"id":1,"name":"A","picture_name":"a.png"},{"id":2,"name":"B","picture_name":"b.png"}]}
    exit();
}catch(PDOException $ex){
    err('error executing query', __LINE__);
}


echo '{"status":1, "data":{"id":1, "name":"A"}}'; // status 1 means true (success), 0 means false or error , this is plain text





// video 3
// 
function err($message = 'error', $debug = 0){    // if error
    echo '{"status":0,
           "message": "'.$message.'",
           "debug":'.debug.'}';
    exit();
}


?>



<!-- To get user with id=3 from database use below -->
<!-- http://localhost/coders/coders_page/back/get-user.php?id=3 -->