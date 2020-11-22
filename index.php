<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Journal</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="script.js"></script>
</head>
<body>
	<div id='journal'>
		<ul id="selectBlocks">
			<li class="selBlock">
				<h5 id='subject'>Предмет</h5>
				<div id="subArr" class="square"></div>
				<div class="hidden">
					<a class="hiddenSub hide">Алгебра</a>
					<a class="hiddenSub hide">Геометрия</a>
					<a class="hiddenSub hide">Физика</a>
					<a class="hiddenSub hide">Химия</a>
					<a class="hiddenSub hide">География</a>
					<a class="hiddenSub hide">Биология</a>
					<a class="hiddenSub hide">Английский</a>
					<a class="hiddenSub hide">История</a>
					<a class="hiddenSub hide">Информатика</a>
					<a class="hiddenSub hide">Русский язык</a>
					<a class="hiddenSub hide">Литература</a>
					<a class="hiddenSub hide">Обществознание</a>
				</div>
			<li class="selBlock bl2">
				<h5 id='month'>Месяц</h5>
				<div id="monArr" class="square"></div>
				<div class="hidden">
					<p class="hiddenMon hide">Сентябрь</p>
					<p class="hiddenMon hide">Октябрь</p>
					<p class="hiddenMon hide">Ноябрь</p>
					<p class="hiddenMon hide">Декабрь</p>
					<p class="hiddenMon hide">Январь</p>
					<p class="hiddenMon hide">Февраль</p>
					<p class="hiddenMon hide">Март</p>
					<p class="hiddenMon hide">Апрель</p>
					<p class="hiddenMon hide">Май</p>
				</div>				
			</li>
		</ul>
		<table id="table">
			<tr>
				<td>№</td>
				<td>Ученики</td>
			</tr>
			<?php 
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$con = mysqli_connect("127.0.0.1", "root", "", "journal");
			if ($con == False){
				echo "error";
				exit();
			}
			$monthes = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 
				'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
			if(isset($_POST['mon'])){
				$mon = $_POST['mon'];
				$sub = $_POST['sub'];
				translate($mon);
				dataPrinting($mon);
				studentsPrinting();
			}
			function translate($mon){						
				for($i=0; $i < count($monthes); $i++){
					if ($monthes[$i+1] == $mon){
						$mon = $i+1;
						break;
					}
				}
			}
			function dataPrinting($mon){
				$sql = "SELECT * FROM `marks` WHERE `marks`.`month` = $mon";
				$res = mysqli_query($con, $sql);
				while ($data = mysqli_fetch_array($res)){
					echo "<td>".$data['data']."</td>";
				} 
			}
			function studentsPrinting(){
				$sql = "SELECT * FROM `students`";
				$res = mysqli_query($con, $sql);
				$counter = 1;
				while ($student = mysqli_fetch_array($res)){
					echo "<tr><td>".$counter."</td>". "<td>".$students['name']." ".$students['lastName']."</td></tr>";
					$counter++;
				}
			}
			?>
		</table>
	</div>
</body>
</html>
