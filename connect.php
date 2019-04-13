<?php 

function getDBConnection() {
    $host = "localhost";
    $dbName = "example-database";
    $user = "errickshaffer";
    $pass = "";
    
    $dsn = "mysql:host=$host;dbname=$dbName";
    
    $pdo = new PDO($dsn,$user,$pass,$opt);
    return $pdo;
    
    $query= "select * from mp_product";
    $statement= $pdo->prepare($query);
    $statement->execute;
    
    $records = $statement->fetchAll();
    
    echo json_encode($records);
}




?>