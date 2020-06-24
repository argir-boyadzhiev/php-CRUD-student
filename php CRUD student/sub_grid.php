<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css_sub_grid.css">
</head>
 
<body>
    <h3 class="zag">Списък с дисциплини</h3>
	<a class="bl1" href="sub_add.html">Добавяне на дисциплина</a>
	<a class="bl2" href="index.php">Начално меню</a>
	<br><br>
	<table class="tab" border="1">
	<tr>
	<td class="tg">#</td>
	<td class="tg">Име</td>
	<td class="tg">Хорариум(Л)</td>
	<td class="tg">Хорариум(У)</td>
	<td class="tg" colspan="2"></td>
	</tr>
	<?php
	require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$n = 1;
	$sql = "SELECT * FROM subjects ORDER BY subject_id";
	foreach($conn->query($sql) as $row)
	{
		echo '<tr>';
		echo '<td class="tg">'.$n.'</td>';
		echo '<td class="tg">'.$row['subject_name'].'</td>';
		echo '<td class="tg">'.$row['subject_workload_lectures'].'</td>';
		echo '<td class="tg">'.$row['subject_workload_exercises'].'</td>';
		echo '<td class="tg"><a href="sub_update.php?id='.$row['subject_id'].'"><img height="25px" width="30px" src="css/edit.png"></a></td>';
		echo '<td class="tg"><a href="sub_delete.php?id='.$row['subject_id'].'"><img height="25px" width="30px" src="css/delete.png"></a></td>';
		echo '</tr>';
		$n++;
	}
	?>
	
	</table>
</body>
</html>