<?php

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("ottermart");

$product = $_GET['productKeyword'];

//this query works BUT allows SQL INJECTION (because of the single quotes)
//$sql = "SELECT * FROM `om_product` WHERE productName LIKE '%$product%'";

$sql = "SELECT * FROM `om_product` WHERE productName LIKE :products";

$namedParameters = array();
$namedParameters[":product"] = "%$product";

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //debugging    
echo json_encode($records);

?>