<?php

$host = "localhost";
$dbname = "nti_task4";
$charset = "utf8mb4";
$username = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try{
    $sql = new PDO($dsn,$username,$pass);
}catch(PDOException $e){
    echo "There is something wrong";
}