<?php

$charset = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$username = 'root';
$password = '';

try {
	// http://php.net/manual/en/pdo.connections.php
	$conn = new PDO("mysql:host=localhost;dbname=test1", $username, $password, $charset);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo $e->getMessage();
}
 
?>