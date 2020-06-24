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
<h3 class="zag3">Промяна на специалност</h3>
<table class="tab3">
<form action="<?php echo 'spec_updatephp.php?id='.$id; ?>" method="post">
<?php
echo '<tr><td style="text-align: right">Име:</td><td><input style="font-size: 20px" type="text" name="speciality_name_long" placeholder="Име на специалността" value="'.$lname.'"></td></tr>';
echo '<tr><td style="text-align: right">Абревиатура:</td><td><input style="font-size: 20px" type="text" name="speciality_name_short" placeholder="Абревиатура на специалността" value="'.$sname.'"></td></tr>';
?>
 <tr><td></td><td><input style="font-size: 20px" type="submit"> <a class="bl3" href="spec_grid.php">Отказ</a></td></tr>
</form>
</body>
</html>
