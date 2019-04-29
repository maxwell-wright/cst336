<?php
include "../../../inc/dbConnection_heroku.php";
//receive email and score from the quiz

//1. Get latest score based on email
//2. If record found, first display it in JSON format, then update record
//3. If record not found, insert a new record for that email


$conn = getDatabaseConnection("heroku_af1b57caccf5520");

$email = $_GET['email'];
$score = $_GET['score'];

$sql = "SELECT * FROM quiz WHERE `email` = $email";  //Retrieves ALL records

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($records)) {
    // insert new row
    $sql = "INSERT INTO quiz (`email`, `score`, `taken`) VALUES ($email, $score, 1)";
    $stmt = $conn -> prepare($sql);
    $stmt->execute();
    // prepare reply string "keyword has been searched 1 time"
    // overwrite records
    $records = array('email' => $email, 'score' => 0, 'taken' => 1); // do we need a return?
    
} else {
    // Find out how to access current frequency
    $taken = $records[0]['taken'] + 1;
    // update times searched
    $sql = "UPDATE quiz
    SET score = $score,
    taken = $taken
    WHERE  quiz.email =  $email";
    $stmt = $conn -> prepare($sql);
    $stmt->execute();
    
    $records = array('email' => $email, 'score' => $records[0]['score'], $taken);
}

echo json_encode($records);

?>
