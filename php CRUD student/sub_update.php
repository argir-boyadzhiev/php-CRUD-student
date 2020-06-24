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
	
	$sql1 = "SELECT * FROM subjects";
	
	foreach($conn->query($sql1) as $row)
	{
		if($row['subject_id'] == $id)
		{
			$name = $row['subject_name'];
			$h_l = $row['subject_workload_lectures'];
			$h_u = $row['subject_workload_exercises'];
		}
		
	}
?>


<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/css_sub_grid.css">
</head>
<body>
<h3 class="zag3">Промяна на дисциплина</h3>
<form action="<?php echo 'sub_updatephp.php?id='.$id; ?>" method="post">
<table class="tab3">
<?php
echo '<tr><td style="text-align: right">Име:</td><td><input style="font-size: 20px" type="text" name="subject_name" placeholder="Име на дисциплина" value="'.$name.'"></td></tr>';
echo '<tr><td style="text-align: right">Хорариум(Л):</td><td><input style="font-size: 20px" type="text" name="subject_workload_lectures" placeholder="Хорариум(Л)" value="'.$h_l.'"></td></tr>';
echo '<tr><td style="text-align: right">Хорариум(У):</td><td><input style="font-size: 20px" type="text" name="subject_workload_exercises" placeholder="Хорариум(У)" value="'.$h_u.'"></td></tr>';
?>
 <tr><td></td><td><input style="font-size: 20px" type="submit"> <a class="bl3" href="sub_grid.php">Отказ</a></td></tr>
</form>
</body>
</html>
