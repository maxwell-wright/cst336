<?php

function getDatabaseConnection($dbname = "midterm") {
    
    $host = "localhost";
    $username = "root";
    $password = "";
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display error when accessing tables
    $dbConn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    }


?>