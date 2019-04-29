<?php
include "../../../inc/dbConnection_heroku.php";
//receive email and score from the quiz

//1. Get latest score based on email
//2. If record found, first display it in JSON format, then update record
//3. If record not found, insert a new record for that email


$conn = getDatabaseConnection("");

$email = $_GET['email'];
$score = $_GET['score'];
$arr = array();
$arr[':email'] = $email;

$sql = "SELECT * FROM quiz WHERE `email` = :email";  //Retrieves ALL records

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($arr);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);


$arr[':score'] = $score;

if (empty($records)) {
    // insert new row
    $sql = "INSERT INTO quiz (`email`, `score`, `taken`) VALUES (:email, :score, 1)";
    $stmt = $conn -> prepare($sql);
    $stmt->execute($arr);
    
    $records = array('email' => $email, 'score' => 0, 'taken' => 1);
    
} else {
    $taken = $records[0]['taken'] + 1;
    $arr[':taken'] = $taken;
    $sql = "UPDATE quiz SET `score` = :score, `taken` = :taken WHERE `email` = :email";
    $stmt = $conn -> prepare($sql);
    $stmt->execute($arr);
    
    $records = array('email' => $email, 'score' => $records[0]['score'], 'taken' => $taken);
}

echo json_encode($records);
?>
