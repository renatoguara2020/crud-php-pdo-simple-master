<?php

$databaseHost = 'localhost';
$databaseName = 'test1';
$databaseUsername = 'root';
$databasePassword = '';

try {
	// http://php.net/manual/en/pdo.connections.php
	$conn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
	// More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
} catch(PDOException $e) {
	echo $e->getMessage();
}
 
?>