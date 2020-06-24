<!DOCTYPE html>



<?php
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$id = $_GET['id'];
	$lname = $conn->real_escape_string($_POST['speciality_name_long']);
	$sname = $conn->real_escape_string($_POST['speciality_name_short']);
    
			
    $sql = "UPDATE specialities SET speciality_name_long = '$lname' , speciality_name_short = '$sname'  WHERE speciality_id = '$id'";
    $conn->query($sql);
    header("Location: spec_grid.php");
    
?>
