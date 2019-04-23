<?php

include '../../../inc/dbConnection_heroku.php';
$conn = getDatabaseConnection("pokeDatabase");

$pokeName = $_GET['name'];
$pokeId = $_GET['id'];

$sql = "UPDATE `poke_searches` SET `timesSearched` = (`timesSearched` + 1) WHERE ID = $pokeId";
$stmt = $conn->prepare($sql);
$stmt->execute();

// $searches = array();

// $sql = "SEARCH `timesSearched` FROM `poke_searches` WHERE ID = $pokeId";
// $stmt = $conn->prepare($sql);
// $stmt->execute();

//echo $searches;

// get current values
$arr = array();
$sql = "SELECT * FROM `poke_searches` WHERE ID = $pokeId";

$stmt = $conn->prepare($sql);
$stmt->execute($arr);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($records);
?>