<?php

session_start();

    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("poll_database");
    
    // select which to increment
    $option = $_GET['option'];

    if($session['submitted'] = false){
        // increment appropriate value
        $records[0][$option] = intval($records[0][$option]) + 1;
        $arr["newVal"] = intval($records[0][$option]);
        $arr["option"] = $option;
        
        // update value
        $sql = "UPDATE `poll_response` SET " . $option . " = " . $arr['newVal'] . " WHERE 1";
        // $sql = "UPDATE `poll_response` SET :option  = :newVal WHERE 1";
        // Luis couldn't figure out what was wrong with the above line....
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        $session['submitted'] = true;
    }
    
    
    // get current values
    $arr = array();
    $sql = "SELECT * FROM `poll_response`";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    echo json_encode($records);
?>