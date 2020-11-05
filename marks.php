<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Journal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="table">
		<table>
			<tr><a href="index.php">main</a></tr>
			<tr>
				<td width='30px' class='students'>Students</td>
				<td>Data</td>
			</tr>
			<?php
				$con = mysqli_connect("127.0.0.1", "mysql", "mysql", "journal");
					if ($con == false){
						echo "error";
						exit();
					}

				$data = array();
				$sql = "SELECT * FROM marks ORDER BY month";
				$res = mysqli_query($con, $sql);
				$max = mysqli_num_rows($res);
				$counter = 0;
				while ($day = mysqli_fetch_array($res) AND $counter < $max){
					array_push($data, $day);
				}

				$monthes = array($sep = array(),
					$oct = array(),
					$nov = array(),
	
					$dec = array(),
					$jan = array(),
					$feb = array(),
	
					$mar = array(),
					$apr = array(),
					$may = array());

				for ($i = 0; $i < $max; $i++){
					$ind = $data[$i]['month'];
					array_push($monthes[$ind-9], $data[$i]['data']);
				}
				for ($i = 0; $i < 10; $i++){
					if ($monthes[$i][0] != ''){
						asort($monthes[$i]);
					}
				}
				if(isset($_POST['subID'])){
					$id = $_POST['subID'];
				}
				var_dump($_POST['subID']);
				echo($id);
				mysqli_close($con);
			?>
		</table>

	</div>
</body>
</html>

 
