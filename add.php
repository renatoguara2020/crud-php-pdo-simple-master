<html>

<head>
    <title>Add Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
    <div class="container" width="100%">
        <?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
	$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			
			echo '<div class="alert alert-danger" role="alert">
			          Name field is empty
		          </div>';
		}
		
		if(empty($age)) {
			echo '<div class="alert alert-danger" role="alert">
			          Age field is empty
		          </div>';
		}
		
		if(empty($email)) {
			echo '<div class="alert alert-danger" role="alert">
			          Email field is empty
		          </div>';
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$stmt = $conn->prepare("INSERT INTO users(name, age, email) VALUES(:name, :age, :email)");
		$conn->exec("set names utf8mb4");
				
		$stmt->bindparam(':name', $name);
		$stmt->bindparam(':age', $age);
		$stmt->bindparam(':email', $email);
		$stmt->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<div class='alert alert-success'>Data added successfully.</div>";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>