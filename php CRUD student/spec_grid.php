<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css_spec_grid.css">
</head>
 
<body>
    <h3 class="zag">Списък с специалности</h3>
	<a class="bl1" href="spec_add.html">Добавяне на специалност</a>
	<a class="bl2" href="index.php">Начално меню</a>
	<br><br>
	<table class="tab">
	<tr>
	<td class="tg">#</td>
	<td class="tg">Име</td>
	<td class="tg" >Абревиатура</td>
	<td class="tg" colspan="2"></td>
	</tr>
	<?php
	require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$n = 1;
	$sql = "SELECT * FROM specialities ORDER BY speciality_id";
	foreach($conn->query($sql) as $row)
	{
		echo '<tr>';
		echo '<td class="tg">'.$n.'</td>';
		echo '<td class="tg">'.$row['speciality_name_long'].'</td>';
		echo '<td class="tg">'.$row['speciality_name_short'].'</td>';
		echo '<td class="tg"><a href="spec_update.php?id='.$row['speciality_id'].'"><img height="25px" width="30px" src="css/edit.png"></a></td>';
		echo '<td class="tg"><a href="spec_delete.php?id='.$row['speciality_id'].'"><img height="25px" width="30px" src="css/delete.png"></a></td>';
		echo '</tr>';
		$n++;
	}
	?>
	
	</table>
</body>
</html>