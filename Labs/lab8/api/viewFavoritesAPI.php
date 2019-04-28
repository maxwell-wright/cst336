<?php
include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("c9");

//$sql = "SELECT * FROM `lab8_pixabay` WHERE 1";
$sql = "SELECT DISTINCT keyword FROM `lab8_pixabay`";

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
    
    //print_r($records);
    
    echo json_encode($records);

?>