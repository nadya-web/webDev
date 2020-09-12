
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
</head>
<body>

	<section id="form">
		<div id="contactForm">
			<form class="form">
				<label for="name">Name</label>
				<input type="text" name="name" placeholder="Your name">
				<label for="lastName">Last Name</label>
				<input type="text" name="lastName" placeholder="Your last name">
				<label name="label" for="email">E-mail</label>
				<input type="text" name="email" placeholder="Your e-mail address">
				<input type="submit" id="button" value="submit">
			</form>
		</div>
	</section>
	<div id="table">
		<?php
			include "main.php";
			$connection = mysqli_connect("127.0.0.1", "mysql", "mysql", "person's data");
			if ($connection == false){
				echo "Error";
				exit();
			}

			$sql = "SELECT * FROM people";
			$result = mysqli_query($connection, $sql);
			$max = mysqli_num_rows($result);
			$counter = 1;

			while ($person = mysqli_fetch_array($result) AND $counter < $max){
				echo $counter." ".$person[0]." ";
				echo $person[1]." ";
				echo $person[2]."<br>";
				$counter++;
			}
			echo $error; 

			$sql = "DELETE FROM `people` WHERE `people`.`name` = ' ' ";
			mysqli_query($connection, $sql);

			mysqli_close($connection);
		?>
	</div>
	<script type="text/javascript">
		"use strict";
		window.onload=function(){
			$('.form').submit(function(){
				$.ajax({
					type: "POST",
					url: "main.php",
					data: $(this).serialize()
				}).done(function(){
					$(this).find('input').val('');
					$('.form').trigger('reset');
				})
			})			
		}
	</script>
	
</body>
</html>