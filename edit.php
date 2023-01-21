<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$age=$_POST['age'];
	$email=$_POST['email'];	
	//$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email) || empty($cidade)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($cidade)) {

			echo "<font color='red'> Cidade field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$stmt = $conn->prepare("UPDATE users SET name=:name, age=:age, email=:email, cidade=:cidade WHERE id=:id");
		//$query = $conn->prepare($sql);
				
		$stmt->bindparam(':id', $id);
		$stmt->bindparam(':name', $name);
		$stmt->bindparam(':age', $age);
		$stmt->bindparam(':email', $email);
		$stmt->bindparam(':cidade', $cidade);
		$stmt->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE id=:id";
$query = $conn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$name = $row['name'];
	$age = $row['age'];
	$email = $row['email'];
	$cidade = $row['cidade'];
}
?>
<html>

<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="form1" method="post" action="edit.php">

        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $name;?>">


        <label class="form-label">Age</label>
        <input type="text" class="form-control" name="age" value="<?php echo $age;?>">


        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $email;?>">

        <label class="form-label">Cidade</label>
        <input type="text" class="form-control" name="cidade" value="<?php echo $cidade;?>">


        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
        <br><br>
        <input type="submit" name="update" value="Update" class="btn btn-warning">

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>