<?php
    $host = '127.0.0.1';
    $dbname = 'iti_labs';
    $username = 'root';
    $password = 'Konan_123'; 

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // if($pdo){
    //     echo "Connected successfully!"; 
    // }
    // else {
    //     echo "Not Connected";
    // }
?>