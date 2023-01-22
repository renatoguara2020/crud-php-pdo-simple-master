<?php 
include_once('ExamplePDOConnection.php');


$id = $_GET["id"];

$sql = "SELECT * FROM users WHERE id=:id";

$query = $conn->prepare($sql);
$query->execute(array('id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC)){

   $nome = $row["nome"];
   $age = $row["age"];
   $email = $row["email"];
   $cidade = $row["cidade"];
    
}

?>