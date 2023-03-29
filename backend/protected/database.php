<?php


// Video 2

// echo 'database';   // this file defaultly have public access or anyone can access
//                    // for this, create a protected or any name folder 
//                    // create a .htaccess file in protected folder and add some content like...
//                    // this will remove the public access for any URL and make it protected




try{
    $dbUserName = 'root';
    $dbpassword = '';
    $dbConnection = 'mysql:host=localhost; dbname=user_db; charset=utf8';    // this address where db is... , charset - if we have spanish or any language character
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // try-catch
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // JSON (make it json after) // like // json_encode[{},{}] -- step by step or num by num
    ];
    $db = new PDO( $dbConnection,    // this is connection to database 
                   $dbUserName, 
                   $dbpassword,
                   $options );


}
catch(PDOException $ex){
    echo '{
        "status:0, 
        "message":"Cannot connect to db",
        "debug":'.__LINE__.'
    }'; // debug - will display the line number which have an error, we can debug or line...
    exit();  // if we have an error
}