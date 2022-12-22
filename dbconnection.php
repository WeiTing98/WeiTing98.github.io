<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'finalprojectdata';
    $dsn = sprintf('mysql:host=%s;dbname=%s',$hostname,$db_name);
    $option = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    try{
        $pdo = new PDO($dsn,$username,$password,$option);
    }
    catch(PDOException $e){
        echo 'connection error';
        die();
    }
    
?>