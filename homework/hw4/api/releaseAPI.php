<?php
    

include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("pokeDatabase");

$pokeId = $_GET['id'];

$sql = "DELETE FROM `poke_party` WHERE id=$pokeId";
$stmt = $conn->prepare($sql);
$stmt->execute();

echo json_encode($pokeId);

?>