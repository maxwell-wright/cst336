<?php

$otterId = "";
echo $otterId;

$newArray = array("one", "two", "three");

$weekdays = array();

$weekdays[] = "Monday"; //adds monday to the NEXT available index of array
$weekdays[] = "Tuesday";
array_push($weekdays, "Wednesday", "Thursday", "Friday"); //puhs multiple items in sequential order

print_r($weekdays); //prints array w indices

echo "<br>";
echo in_array("Wednesday", $weekdays); //check if value is in array

?>