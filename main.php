<?php
		$connection = new mysqli("127.0.0.1", "mysql", "mysql", "person's data");
			$name = mysqli_real_escape_string($connection, $_POST['name']);
			$lastname = mysqli_real_escape_string($connection, $_POST['lastName']);
			$email = mysqli_real_escape_string($connection, $_POST['email']);
			//$indexFile = file_get_contents("index.php");
			$error = "none";

			if ($connection == false){
				echo "Error";
				exit();
			}
			$sql = "SELECT id FROM people where email = '$email'";
			$result = mysqli_query($connection, $sql);
			if (mysqli_num_rows($result) == 0){
				$sql = "INSERT INTO people(name, lastname, email) VALUES ('$name', '$lastname', '$email')";
				if (mysqli_query($connection, $sql)) {
      				echo "";
				} else {
      				echo "";
				}
			} else {
				$error = "active";
			}
			mysqli_close($connection);
?>