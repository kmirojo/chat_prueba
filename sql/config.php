<?php

$dbhost = 'localhost';
$dbname = 'chat_prueba';
$dbuser = 'root';
$dbpass = '';

try{
    $db = new PDO("mysql:dbhost=$dbhost; dbname=$dbname", "$dbuser", "$dbpass");
    // $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
} catch (PDOException $e) {
    echo $e->getMessage();
}