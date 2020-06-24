<!DOCTYPE html>

<?php
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$name = null;
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
	$id = $_GET['id'];
	
	$sql1 = "SELECT * FROM courses";
	foreach($conn->query($sql1) as $row)
	{
		if($row['course_id'] == $id)
		{
			$name = $row['course_name'];
		}
		
	}
?>


<html>
<head>
<meta charset="utf-8">
<link   href="css/css_kurs_grid.css" rel="stylesheet">
</head>
<body>

<form action="<?php echo 'kurs_deletephp.php?id='.$id; ?>" method="post">
<div class="del">Сигурни ли сте че искате да изтриете курс:
<?php
echo $name;
?>
<br>
<center><input class="bl5" type="submit" value="Да"> <a class="bl4" href="kurs_grid.php">Отказ</a></center>

</form>
</div>
</body>
</html>
