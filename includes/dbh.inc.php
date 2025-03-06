<?php 
$dsn = "mysql:host=0688553.tim-cstj.ca;dbname=e0688553_lesCuisinesduChaos";
$userName = 'e0688553';
$password = 'Chicoine8778';


try{
    $pdo = new PDO($dsn, $userName, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

} 
