<?php
include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("pokeDatabase");

$pokeId = $_GET['keyword'];

$sql = "SELECT * FROM `poke_searches` WHERE name = $pokeId";

$stmt = $conn->prepare($sql);
$stmt->execute($arr);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);
?>