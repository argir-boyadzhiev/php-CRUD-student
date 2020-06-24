<!DOCTYPE html>

<?php
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	$lname = null;
	$sname = null;
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
	$id = $_GET['id'];
	
	$sql1 = "SELECT * FROM specialities";
	foreach($conn->query($sql1) as $row)
	{
		if($row['speciality_id'] == $id)
		{
			$lname = $row['speciality_name_long'];
			$sname = $row['speciality_name_short'];
		}
		
	}
?>


<html>
<head>
<meta charset="utf-8">
<link   href="css/css_spec_grid.css" rel="stylesheet">
</head>
<body>

<form action="<?php echo 'spec_deletephp.php?id='.$id; ?>" method="post">
<div class="del">Сигурни ли сте че искате да изтриете дисциплина:
<?php
echo $lname.' - '.$sname;
?>

<br>
<input type="submit" style="font-size: 20px" value="Да"> <a class="bl3" href="spec_grid.php">Отказ</a></div>
</form>

</body>
</html>
