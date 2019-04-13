<?php
session_start();

//checks whether user has logged in
if (!isset($_SESSION['adminName'])) {
    
    header('location: login.html'); //sends users to login screen if they haven't logged in
    
}


    
    include '../../../inc/dbConnection_heroku.php';
    $conn = getDatabaseConnection("ottermart");

    $productId = $_GET['productId'];
    
    $sql = "SELECT * FROM om_product WHERE productId = $productId";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($product);

?>