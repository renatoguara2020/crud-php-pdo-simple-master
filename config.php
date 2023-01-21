<?php


$username = 'root';
$password = '';

try {
	// http://php.net/manual/en/pdo.connections.php
	$conn = new PDO("mysql:host=localhost;dbname=test1", $username, $password);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo $e->getMessage();
}
 
?>