<!DOCTYPE html>

<?php
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	$name = null;
	$h_l = null;
	$h_u = null;
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
			$h_u = $row['subject_workload_exercises'];
			$h_l = $row['subject_workload_lectures'];
		}
		
	}
?>


<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/css_sub_grid.css">
</head>
<body>

<form action="<?php echo 'sub_deletephp.php?id='.$id; ?>" method="post">
<div class="del">Сигурни ли сте че искате да изтриете дисциплина?<br>
<center><table>
<tr><td style="text-align: right">Име:</td><td>
<?php
echo $name;
?></td></tr>

<tr><td style="text-align: right">Хорариум(Л):</td><td>
<?php
echo $h_l;
?></td></tr>
 
<tr><td style="text-align: right">Хорариум(У):</td><td>
<?php
echo $h_u;
?></td></tr>


<tr><td></td><td><input style="font-size: 20px" type="submit" value="Да"> <a class="bl3" href="sub_grid.php">Отказ</a></td></tr>
</table>
</center>
</div>
</form>

</body>
</html>
