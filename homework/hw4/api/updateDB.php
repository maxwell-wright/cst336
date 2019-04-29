<?php

include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("pokeDatabase");

$pokeName = $_GET['name'];
$pokeId = $_GET['id'];
$pokeType = $_GET['type'];
$pokeSprite = $_GET['sprite'];

//echo json_encode($_GET);

$sql = "INSERT INTO `poke_party`(`id`, `name`, `type`, `sprite`) VALUES ('$pokeId','$pokeName','$pokeType','$pokeSprite')";
$stmt = $conn->prepare($sql);
$stmt->execute();

// $searches = array();

// $sql = "SEARCH `timesSearched` FROM `poke_searches` WHERE ID = $pokeId";
// $stmt = $conn->prepare($sql);
// $stmt->execute();

//echo $searches;

// get current values

//WILL NEED THIS*******************************************************************************

// $arr = array();
// $sql = "SELECT * FROM `poke_searches` WHERE ID = $pokeId";

// $stmt = $conn->prepare($sql);
// $stmt->execute($arr);
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);


// echo json_encode($records);
?>