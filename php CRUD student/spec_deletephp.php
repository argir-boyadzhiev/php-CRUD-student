<!DOCTYPE html>



<?php
    require 'db_connection.php';
	$conn = OpenCon();
	mysqli_set_charset($conn,"utf8");
	
	$id = $_GET['id'];
	$name = $conn->real_escape_string($_POST['speciality_name']);
	
    
			
    $sql = "DELETE FROM specialities WHERE speciality_id = '$id'";
    $conn->query($sql);
    header("Location: spec_grid.php");
    
?>
