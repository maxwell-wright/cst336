<?php
session_start();

//checks whether user has logged in
if (!isset($_SESSION['adminName'])) {
    
    header('location: login.html'); //sends users to login screen if they haven't logged in
    
}


    include '../../inc/dbConnection_heroku.php';
    $conn = getDatabaseConnection("heroku_af1b57caccf5520");

    $sql = "DELETE FROM `om_product` WHERE `om_product`.`productId` = " . $_POST['productId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    //echo $sql;

    header("Location: admin.php");

?>