<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css_ass_add.css">
</head>
 
<body>
    <h3 class="zag">Добавяне на оценка</h3>
	<a class="bl" href="index.php">Начално меню</a>
	<br><br>
	<div class="edno">
	<center>
	<form action="ass_addphp.php" method="post">
	<table>
	<tr><td class="ar">Име:</td> <td><input class="inp" type="text" list="names" name="st_id">
	<datalist id="names">
	<?php
	require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$sql = 'SELECT * FROM students';
                   foreach ($conn->query($sql) as $row) {
                            echo '<option value="'.$row['student_fname'].' '.$row['student_lname'].'">';
                            }
	?>
	</datalist>
	</td></tr>
	<tr><td class="ar">Дисциплина:</td>
	
	<td><select class="inp" name="dis" >
	<?php
	
	
	$sql1 = 'SELECT * FROM subjects';
                   foreach ($conn->query($sql1) as $row) {
                            echo '<option value="'.$row['subject_id'].'">'.$row['subject_name'].'</option>';
                            }
	?>
</select></td></tr>
	<tr><td class="ar">Хорариум(Л):</td><td><input class="inp" type="text" name="h_l"></tr></td>
	<tr><td  class="ar">Хорариум(У):</td><td><input class="inp" type="text" name="h_u"></tr></td>
	<tr><td class="ar">Оценка:</td><td><input class="inp" type="text" name="ocen"></tr></td>
	<tr><td></td><td><input class="inp" type="submit" value="Добави"></td></tr>
	</table>
	</form>
	</center>
	</div>

  </body>
</html>