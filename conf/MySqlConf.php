<?php

    // arquivo para configurações 

    $dsn = "mysql:host=localhost;dbname=mailer";
    $username = 'root'; // altere se nescessário
    $password = 'sua senha'; // altere

    try{
        $dbh = new PDO($dsn, $username, $password);
        $dataBaseStatus = true;
    }catch (Exception $e){
        $dataBaseStatus = false;
    }
    
?>
