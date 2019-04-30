<?php
    

include '../../../inc/dbConnection_heroku.php';
$conn = getDatabaseConnection("pokeDatabase");

// $sql = "INSERT INTO `poke_party`(`id`, `name`, `type`, `sprite`) VALUES ('$pokeId','$pokeName','$pokeType','$pokeSprite')";
// $stmt = $conn->prepare($sql);
// $stmt->execute();

$sql = "SELECT * FROM `poke_party`";

$stmt = $conn->prepare($sql);
$stmt->execute($arr);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($records);

?>