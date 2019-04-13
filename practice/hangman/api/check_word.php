<?php
//Used to check the letter the user inputed in the form, and if the letter is in the word
//Should return an array of booleans as the api
include '../dbConnection.php';

$wordId = intval($_GET['wordId']);
$char = $_GET['guess'];

$conn = getDatabaseConnection("hangman");

$sql = "SELECT * FROM words WHERE word_id = $wordId";
$stmt = $conn -> prepare($sql);  
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

$charArray = str_split($record["word"]);
$idxArray = [];

for( $i = 0; $i < count($charArray); $i++ ){
    if($char == $charArray[$i]){
        array_push($idxArray, $i);
    }
}

echo json_encode($idxArray);
?>