<?php

include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("c9");

$keyword = $_GET['keyword'];

//$sql = "SELECT * FROM `lab8_pixabay` WHERE 1";
$sql = "SELECT imageURL FROM `lab8_pixabay` WHERE keyword = $keyword";

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
    
    //print_r($records);
    
    echo json_encode($records);


?>