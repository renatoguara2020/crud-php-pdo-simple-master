<?php 
include_once('ExamplePDOConnection.php');

 if(isset($_POST['Update'])){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];

if(empty ($_POST['nome']) || empty ($_POST['email']) || empty ($_POST['cidade'])){

    if(empty($nome)){

        echo '<div class="alert alert-danger"> Digite seu nome </div>';
    }

}
 }































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

    <form action="ExampleEdit.php" method="post">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>"
            placeholder="Digite seu Nome" />
        <label class="form-label">Email:</label>
        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>"
            placeholder="Digite seu Email" />
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>"
            placeholder="Digite sua cidade" />

        <input type="hidden" name="id" value="<?php $_GET['id']; ?>" />

        <input type="submit" name="Update" value="Update" class="btn btn-warning" />
    </form>
</body>

</html>