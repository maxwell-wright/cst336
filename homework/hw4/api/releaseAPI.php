<?php
    

include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("pokeDatabase");

$pokeId = $_GET['item'];

// STILL HAVING ISSUES WITHOUT THIS SQL STATEMENT....BUT CAN'T FIGURE OUT WHAT MY DB DOESN'T LIKE
$sql = "DELETE FROM `poke_party` WHERE `id` = $pokeId"; 
$stmt = $conn->prepare($sql); 
$stmt->execute();

echo json_encode($pokeId);

?>