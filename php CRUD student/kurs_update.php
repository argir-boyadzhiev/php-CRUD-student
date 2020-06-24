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
<h3 class="zag3">Промяна на курс</h3>
<table class="tab3"><tr>
<form action="<?php echo 'kurs_updatephp.php?id='.$id; ?>" method="post">
<?php
echo '<td style="text-align: right">Име:</td><td><input style="font-size: 20px" type="text" name="course_name" placeholder="Име на курса" value="'.$name.'"></td>';
?>
</tr>
<tr>
<td></td>
 <td><input style="font-size: 20px" type="submit"> <a class="bl3" href="kurs_grid.php">Отказ</a></td></tr>
</form>
</table>
</body>
</html>
