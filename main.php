<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div id="table">
		<table>
			<tr><td>9th grade</td></tr>
			<tr><td>Subjects list</td></tr>
			<?
				$con = mysqli_connect("127.0.0.1", "mysql", "mysql", "journal");
					if ($con == false){
						echo "error";
						exit();
					}
				$sql = "SELECT * FROM `subjects`";
				$res = mysqli_query($con, $sql);
				while ($subject = mysqli_fetch_array($res)){
				echo "<tr class='sub' id='".$subject['subID']."'><td><a href='marks.php'>".$subject['subject']."</a></td></tr>";
			}
			?>
			<script type="text/javascript">
				window.onload=function(){
					let subList = document.querySelectorAll('.sub');
					console.log(subList);
					for(let i=0; i < subList.length; i++){
						subList[i].addEventListener('click', function(){
							let id = 1234;
							$.ajax({
								type: 'POST',
								url: 'marks.php',
								dataType: 'json',
								data: {subID: id},
								success: function(){
									alert("ok");
								},
								error: function() {
        							alert("not ok");
        						}
							})
						})
					}
			}
			</script>
		</table>
	</div>
</body>
</html>
