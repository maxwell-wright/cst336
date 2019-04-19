<?php
    

    
    function getDatabaseConnection($dbname){
        $host = "us-cdbr-iron-east-02.cleardb.net";
        $username = "b184106b8bd92a";
        $password = "853ab472";
        
        
    //mysql://b184106b8bd92a:853ab472@us-cdbr-iron-east-02.cleardb.net/heroku_af1b57caccf5520?reconnect=true
        
        
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 

        
        //creates db connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        //display error when accessing tables
        $dbConn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }



?>