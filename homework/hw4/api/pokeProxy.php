<?php

//https://pokeapi.co/api/v2/

//$searchFor = $_GET['searchFor'];
$keyword = $_GET['keyword'];

$curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://pokeapi.co/api/v2/pokemon/$keyword",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
      ),
  ));

$jsonData = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

echo $jsonData;

// $data = json_decode($jsonData, true);  //from JSON format to an Array

// //print_r($data);

// $imageURLs = array();

// for ($i = 0; $i < 50; $i++) {

//   $imageURLs[] = $data["hits"][$i]["webformatURL"];
  
// }

// shuffle($imageURLs);

// echo json_encode(array_slice($imageURLs, 0, 9)); 

// //print_r($imageURLs);

?>