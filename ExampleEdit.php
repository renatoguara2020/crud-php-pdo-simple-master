<?php

$user = 'root';
$pass = '';

try{

$conn = new PDO("mysql:host=localhost;dbname=test1", $user, $pass);
$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}catch(PDOException $e){

    echo "Error: " . $e->getMessage() . ' '. $e->getTraceAsString();
}