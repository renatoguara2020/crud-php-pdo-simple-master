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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <label class="form-label">Nome:</label>
    <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" placeholder="Digite seu Nome" />

    <input type="hidden" name="id" value="<?php $_GET['id']; ?>" />

</body>

</html>