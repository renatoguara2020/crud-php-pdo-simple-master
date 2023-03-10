<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $conn->query("SELECT * FROM users ORDER BY id ASC");
?>

<html>

<head>
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />


</head>

<body>
    <a href="add.html">Add New Data</a><br /><br />

    <table class="table table-striped table-hover">

        <thead>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Idade</th>
            <th scope="col">Email</th>
            <th scope="col">Estados</th>
            <th scope="col">Cidade</th>
            <th scope="col">Update | Delete</th>
        </thead>
        <?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['id']. "</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['age']."</td>";
		echo "<td>".$row['email']."</td>";	
		echo "<td>".$row['estados']."</td>";
		echo "<td>".$row['cidade']. "</td>";
		echo "<td><a href=\"edit.php?id=$row[id]\">Update</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>