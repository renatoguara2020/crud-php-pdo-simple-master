<?php

$user = 'root';
$pass = '';

try{

$conn = new PDO("mysql:host=localhost;dbname=test1", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

echo 'Connected Successfully with Database';

}catch(PDOException $e){

    echo "Error: " . $e->getMessage() . ' '. $e->getTraceAsString();
}