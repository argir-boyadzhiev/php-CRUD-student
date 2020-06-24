<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css_addstudent.css">
</head>
 
<body>
    <h3 class="zag">Добавяне на студент</h3>
	<a class="bl" href="index.php">Начално меню</a>
	<br><br>
	<form action="addstudentphp.php" method="post">
	<table class="tab1">
	<tr><td  style="font-size: 35px" class="ar">Данни за потребител</td><td></td></tr>
	<tr><td></td><td></td></tr>
	<tr><td class="ar">Потребителско име:</td><td><input class="inp" type="text" name="user_name"></td></tr>
	<tr><td class="ar">Парола:</td><td><input class="inp" type="password" name="pass"></td></tr>
	<tr><td class="ar">Парола(повтори):</td><td><input class="inp" type="password" name="pass1"></td></tr>
	<tr><td class="ar">E-mail:</td><td><input class="inp" type="text" name="email"></td></tr>
	</table>
	<br>
	
	<table class="tab2">
	<tr><td  style="font-size: 35px" class="ar">Данни за студент</td><td></td></tr>
	<tr><td></td><td></td></tr>
	<tr><td class="ar">Собствено име:</td><td><input class="inp" type="text" name="fname"></td></tr>
	<tr><td class="ar">Фамилия:</td><td><input class="inp" type="text" name="lname"></td></tr>
	<tr><td class="ar">Факултетен номер:</td><td><input class="inp" type="text" name="f_number"></td></tr>
	<tr><td class="ar">Курс:</td><td>
<select class="inp" name="kurs" >
	<?php
	require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$sql = 'SELECT * FROM courses order by course_id';
                   foreach ($conn->query($sql) as $row) {
                            echo '<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
                            }
	?>
</select></td></tr>
	<tr><td class="ar">Специалност:</td><td>
<select class="inp" name="spec" >
	<?php
	
	$sql = 'SELECT * FROM specialities';
                   foreach ($conn->query($sql) as $row) {
                            echo '<option value="'.$row['speciality_id'].'">('.$row['speciality_name_short'].')'.$row['speciality_name_long'].'</option>';
                            }
	
	?>
</select></td></tr>
	<tr><td class="ar">Форма на обучение:</td><td>
<select class="inp" name="forma" >
   <option value="Р">(Р)Редовно</option>
   <option value="З">(З)Задочно</option>
</select></td></tr>
	<tr><td></td><td><input class="inp" type="submit" value="Добави"></td></tr>
	</table>
	</form>

  </body>
</html>