<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/CSS_search_grid.css">
</head>
 
<body>
    <center>
	<div class="sform">
	<center>
	<table>
	<tr>
	<td>
	
	
	
	
	
	
	<form  action="search_grid.php?p=0&order=0" method="_GET">
	<div class="alr">
	Име:
	</div>
	</td>
	<td>
	<input type="text" name="gogle">
	</td>
	</tr>
	<tr>
	<td>
	<div class="alr">
	Специалност:
	</div>
	</td>
	<td>
<select name="spec" >
	<option> </option>
	<?php
	require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$sql = 'SELECT * FROM specialities';
                   foreach ($conn->query($sql) as $row) {
                            echo '<option value="'.$row['speciality_id'].'">('.$row['speciality_name_short'].')'.$row['speciality_name_long'].'</option>';
                            }
	
	?>
</select>
</td>
</tr>
<tr>
<td>
<div class="alr">
	Курс:
	</div>
	</td>
	<td>
<select name="kurs" >
	<option> </option>
	<?php
	
	
	
	$sql = 'SELECT * FROM courses';
                   foreach ($conn->query($sql) as $row) {
                            echo '<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
                            }
	?>
</select>
	</td>
	</tr>
	<tr>
	<td>
	</td>
	<td>
	
	
	<input type="submit" value="Търси">
	</td>
	</tr>
	</form>
	</table>
	</center>
	</div>
	</center>
	<br>
	<center><a class="but" href="index.php">Начално меню<a></center>
	
	<?php
		
		if(isset($_GET['kurs']))
			$kurss = $_GET['kurs'];
		else $kurss = null;
		if((int)$kurss == 0) $kurss = null;
		
		
		if(isset($_GET['spec']))
			$specs = $_GET['spec'];
		else $specs = null;
		if((int)$specs == 0) $specs = null;
		
		
		if(isset($_GET['order']))
			$order = $_GET['order'];
		else $order = 0;
	
		if(isset($_GET['gogle'])) $gogle = $_GET['gogle'];
		else $gogle = null;
		$gogletest = "";
		if($gogle === $gogletest) $gogle = null;
		
		
		if(isset($_GET['p'])) $p = $_GET['p'];
		else $p = 0;
		
		$pp = $p-1;
		$np = $p+1;
		
		
		
		
		
		$uch = "select * from students ";
		
		
		
		if($specs != null || $kurss != null || $gogle != null) $uch .= "WHERE ";
		
		
		
		$orange = false;
		
		if($specs != null) {$uch .="student_speciality_id = '$specs' "; $orange = true;}
		
		
		if($kurss != null) {
			if($orange == true) $uch .="and ";
			else $orange = true;
		$uch .="student_course_id ='$kurss' ";}
		
		
		if($gogle != null) {
			if($orange == true) $uch .= "and ";
		$uch .="(student_fname like '%$gogle%' or student_lname like '%$gogle%') ";}
		
			
		
		$uch .= "order by ";
			
			
			
		
		
		
		
		if($order == 0) $uch .= "student_id";
		if($order == 1) $uch .= "student_fname";
		if($order == 2) $uch .= "student_course_id";
		if($order == 3) $uch .= "student_speciality_id";
		
		
		echo "<br>";
		
		
		
	?>
	
	
	
	
	
	
	<table class="tg" border="0">
	
	<tr class="j">
	<td class="j" rowspan="2" colspan="3"></td>
	<?php
	
	mysqli_set_charset($conn,"utf8");
	
	$br = 3;
	
	$a = "SELECT * FROM specialities ORDER BY speciality_id";
	foreach($conn->query($a) as $row)
	{
		$br = $br + 3;
	}
	echo '<td class="j" colspan="'.$br.'">Предмети(хорариум и оценки)</td>';
	?>
	</tr>
	
	<tr class="j">
	
	
	<?php
	foreach($conn->query($a) as $row)
	{
		echo '<td class="j" colspan = "3" >'.$row['speciality_name_long'].'</td>';
	}
	?>
	
	<td class="j" colspan="3">Общо</td>
	</tr>
	
	<tr class="j">
	
	<?php
	echo '<td class="j">#<a class="lb" href="search_grid.php?gogle='.$gogle.'&p='.$p.'&spec='.$specs.'&kurs='.$kurss.'&order=0">▼</a></td >';
	echo '<td class="j">Име,Фамилия<a class="lb" href="search_grid.php?gogle='.$gogle.'&p='.$p.'&spec='.$specs.'&kurs='.$kurss.'&order=1">▼</a></td>';
	echo '<td class="j">Курс<a class="lb" href="search_grid.php?gogle='.$gogle.'&p='.$p.'&spec='.$specs.'&kurs='.$kurss.'&order=2">▼</a> Срециалност<a class="lb" href="search_grid.php?gogle='.$gogle.'&p='.$p.'&spec='.$specs.'&kurs='.$kurss.'&order=3">▼</a></td>';
	?>
	<?php
	foreach($conn->query($a) as $row)
	{
		echo '<td class="j">Лекции</td>';
		echo '<td class="j">Упражнения</td>';
		echo '<td class="j">Оценка</td>';
	}
	?>
	<td class="j">Лекции</td>
	<td class="j">Упражнения</td>
	<td class="j">Оценка</td>
	</tr>
	
	<?php
	$n = 1;
	
	
	
	
	

	
	
	foreach($conn->query($uch) as $row)
	{
		if($n<$p*10+1) {$n++; continue;}
		
		echo '<tr class="j">';
		echo '<td class="j">'.$n.'</td>';
		echo '<td class="j">'.$row['student_fname'].' '.$row['student_lname'].' ('.$row['student_fnumber'].')</td>';
		$alo = $row['student_course_id'];
		$kurs = "select * from courses where course_id = $alo";
		$imenakurs = null;
		$imenaspecialnost = null;
		foreach($conn->query($kurs) as $ik)
		{
			$imenakurs = $ik['course_name'];
		}
		$balo =  $row['student_speciality_id'];
		$spec = "select * from specialities where speciality_id = $balo";
		foreach($conn->query($spec) as $sp)
		{
			$imenaspecialnost = $sp['speciality_name_short'];
		}
		
		echo '<td class="j">'.$imenakurs.','.$imenaspecialnost.',('.$row['student_speciality_id'].')</td>';
		
		
		$prom1 = 0;
		$prom2 = 0;
		$prom3 = 0;
		$prom4 = 0;
		$prom5 = 0;
		$prom6 = 0;
		
		
		$r = $row['student_id'];
		$ocen = "SELECT * FROM students_assessments WHERE sa_student_id = $r";
		foreach($conn->query($ocen) as $col)
		{
			$em = $col['sa_subject_id'];
			$bobo = "select * from subjects where subject_id = $em";
			 foreach($conn->query($bobo) as $bol)
			 {
				echo '<td class="j">'.$col['sa_workload_lectures'].'('.$bol['subject_workload_lectures'].')</td>';
				$prom1 = $prom1 + $col['sa_workload_lectures'];
				$prom2 = $prom2 + $bol['subject_workload_lectures'];
				echo '<td class="j">'.$col['sa_workload_exercises'].'('.$bol['subject_workload_exercises'].')</td>';
				$prom3 = $prom3 + $col['sa_workload_exercises'];
				$prom4 = $prom4 + $bol['subject_workload_exercises'];
				$pik = null;
				switch ($col['sa_assesment'])
				{
					case 2: $pik = "Слаб"; break;
					case 3: $pik = "Среден"; break;
					case 4: $pik = "Добър"; break;
					case 5: $pik = "Мн.Добър"; break;
					case 6: $pik = "Отличен"; break;
					
				}
				echo '<td class="j">'.$pik.'('.$col['sa_assesment'].')</td>';
				$prom5 = $prom5 + $col['sa_assesment'];
				$prom6++;
			 }
			
			
		}	
		
		
		echo '<td class="j">'.$prom1.'('.$prom2.')</td>';
		echo '<td class="j">'.$prom3.'('.$prom4.')</td>';
		$pik = null;
		if($prom6 != 0) $alko = $prom5 / $prom6;
		
		if($alko < 3) $alko = 2;
		if($alko>=3 and $alko < 3.5) $alko = 3;
		if($alko>=3.5 and $alko <4.5) $alko = 4;
		if($alko>=4.5 and $alko <5.5) $alko = 5;
		if($alko>=5.5) $alko = 6;
		
		
		
		
		
		
		
		
		switch ($alko)
			{
				case 2: $pik = "Слаб"; break;
				case 3: $pik = "Среден"; break;
				case 4: $pik = "Добър"; break;
				case 5: $pik = "Мн.Добър"; break;
				case 6: $pik = "Отличен"; break;	
			}
		echo '<td class="j">'.$pik.'('.$alko.')</td>';
		
		
		
		
		
		echo '</tr>';
		if($n>($p*10+9)) break;
		$n++;
	}
	?>
	</table>
	<?php
	
	$l = 0;
	foreach($conn->query($uch) as $row)
	{
		$l++;
	}
	echo '<br>';
	if($p>0) echo '<a class="but" href="search_grid.php?gogle='.$gogle.'&p='.$pp.'&order='.$order.'&spec='.$specs.'&kurs='.$kurss.'">Предишна страница</a>';
		
		
		echo ' ';
	if($l>$p*10+10) echo '<a class="but" href="search_grid.php?gogle='.$gogle.'&p='.$np.'&spec='.$specs.'&kurs='.$kurss.'&order='.$order.'"> Следваща страница </a>';
	
	
	?>
	
	
	
	
	
	
	
	
	
	
</body>
</html>