<?php

include 'dbConnection.php';

$conn = getDatabaseConnection("midterm");

$sql = "SELECT * FROM m_question ORDER BY RAND()";

$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($records);



?>

