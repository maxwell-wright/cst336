<?php

include '../../../inc/dbConnection_heroku.php';
$dbConn = getDatabaseConnection("ottermart");

//header('Access-Control-Allow-Origin: *');

// $host = "";
// $dbname = "";
// $username = "";
// $password = "";

// // Establishing a connection
// $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "SELECT * FROM om_product ORDER BY productPrice";
$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //displays array content

echo json_encode($records);

//echo $records[0]['productName'];
?>  