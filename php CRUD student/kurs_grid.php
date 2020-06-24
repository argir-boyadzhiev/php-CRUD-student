<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css_kurs_grid.css">
</head>
 
<body>
    <h3 class="zag">Списък с курсове</h3>
	<a class="bl" href="kurs_add.html">Добавяне на курс</a>
	<a class="bl" href="index.php">Начално меню</a>
	<br><br>
	<table  border="1" class="tab">
	<tr>
	<td class="tg">#</td>
	<td class="tg">Име</td>
	<td class="tg" colspan="2"></td>
	</tr>
	<?php
	require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$n = 1;
	$sql = "SELECT * FROM courses ORDER BY course_id";
	foreach($conn->query($sql) as $row)
	{
		echo '<tr>';
		echo '<td class="tg">'.$n.'</td>';
		echo '<td class="tg">'.$row['course_name'].'</td>';
		echo '<td class="tg"><a href="kurs_update.php?id='.$row['course_id'].'"><img height="25px" width="30px" src="css/edit.png"></a></td>';
		echo '<td class="tg"><a href="kurs_delete.php?id='.$row['course_id'].'"><img height="25px" width="30px" src="css/delete.png"></a></td>';
		echo '</tr>';
		$n++;
	}
	?>
	</table>
	
</body>
</html>