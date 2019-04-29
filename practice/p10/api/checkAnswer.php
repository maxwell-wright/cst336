<?php
include "../../../inc/dbConnection_heroku.php"
//receive email and score from the quiz

//1. Get latest score based on email
//2. If record found, first display it in JSON format, then update record
//3. If record not found, insert a new record for that email


$conn = getDatabaseConnection("heroku_af1b57caccf5520");

$email = $_GET['email'];
$score = $_GET['score'];
$namedParameters = array();


$sql = "SELECT * FROM quiz WHERE 1 AND email LIKE $email";  //Retrieves ALL records

$namedParameters[":score"] = $score; // why in a string?

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$records = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($records)) {
    // insert new row
    $sql = "INSERT INTO quiz ( `email`, `score`, `taken`) VALUES ($email, :score, 1)";
    $stmt = $conn -> prepare($sql);
    $stmt->execute($namedParameters);
    // prepare reply string "keyword has been searched 1 time"
    // overwrite records
    $records = array('email' => $email, 'score' => 0, 'taken' => 1); // do we need a return?
    
} else {
    // Find out how to access current frequency
    $taken = $records[0]['taken'] + 1;
    $namedParameters[":taken"] = "$taken";
    // update times searched
    $sql = "UPDATE quiz
    SET score = :score,
    taken = :taken
    WHERE  quiz.eamil =  $email";
    $stmt = $conn -> prepare($sql);
    $stmt->execute($namedParameters);
    
    $records = array('email' => $email, 'score' => $records[0]['score'], $taken);
}

echo json_encode($records);

?>
